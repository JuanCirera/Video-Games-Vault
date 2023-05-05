<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\User;
use App\Providers\ApiServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

use function Ramsey\Uuid\v1;

class ShowReviews extends Component
{
    public string $order = "desc", $field = "title";
    public User $user;
    protected $videogame;
    public $games;
    public $reviews = [];
    public $url;


    public function render()
    {
        if (Auth::user()) {
            $this->user = Auth::user();
        }

        $this->videogame = Cache::remember($this->url, 86400, fn () => (ApiServiceProvider::getVideogameDetails($this->url)
        ));

        if (!$this->videogame) {
            $this->back();
        }

        if ($this->videogame) {
            $this->reviews = Review::where("videogame_id", $this->videogame->id)->orderBy($this->field, $this->order)->get();
        }

        if (isset($this->user)) {
            $this->reviews = Review::where("user_id", $this->user->id)->orderBy($this->field, $this->order)->get();
        }

        return view(
            'livewire.pages.reviews.show-reviews',
            [
                "reviews" => $this->reviews,
                "videogame" => $this->videogame,
            ]
        );
    }

    private function back()
    {
        return redirect(url()->previous())->with('error_msg', 'El videojuego que buscas no se encuentra');
    }

    public function mount()
    {
        //NOTE: el mount SOLO se ejecuta la primera vez que carga la vista, no se llama al actualizar elementos con model
        $this->url = substr(parse_url(url()->current(), PHP_URL_PATH), 7);
    }

    public function sort($field)
    {
        $this->field = $field;
        $this->order = ($this->order == "desc") ? "asc" : "desc";
    }

    public function like(Review $review)
    {
        if (isset($this->user)) {

            if (count($this->user->reviewsLiked()->get())) {

                if ($this->user->reviewsLiked()->wherePivot("review_id", $review->id)->get()) {
                    $this->user->reviewsLiked()->detach([$this->user->id, $review->id]);
                    $review->likes--;
                    $review->save();
                } else {
                    if ($this->user->reviewsDisliked()->wherePivot("review_id", $review->id)->get()) {
                        $this->user->reviewsDisliked()->detach([$this->user->id, $review->id]);
                        $review->dislikes--;
                    }
                    $this->user->reviewsLiked()->attach($this->user->id, ["review_id" => $review->id]);
                    $review->likes++;
                    $review->save();
                }
            } else {
                if (count($this->user->reviewsDisliked()->get()) && $this->user->reviewsDisliked()->wherePivot("review_id", $review->id)->get()) {
                    $this->user->reviewsDisliked()->detach([$this->user->id, $review->id]);
                    $review->dislikes--;
                }
                $this->user->reviewsLiked()->attach($this->user->id, ["review_id" => $review->id]);
                $review->likes++;
                $review->save();
            }
        }
    }

    public function dislike(Review $review)
    {
        if (isset($this->user)) {

            if (count($this->user->reviewsDisliked()->get())) {

                if ($this->user->reviewsDisliked()->wherePivot("review_id", $review->id)->get()) {
                    $this->user->reviewsDisliked()->detach([$this->user->id, $review->id]);
                    $review->dislikes--;
                    $review->save();
                } else {
                    if ($this->user->reviewsLiked()->wherePivot("review_id", $review->id)->get()) {
                        $this->user->reviewsLiked()->detach([$this->user->id, $review->id]);
                        $review->likes--;
                    }
                    $this->user->reviewsDisliked()->attach($this->user->id, ["review_id" => $review->id]);
                    $review->dislikes++;
                    $review->save();
                }

            } else {
                if (count($this->user->reviewsLiked()->get()) && $this->user->reviewsLiked()->wherePivot("review_id", $review->id)->get()) {
                    $this->user->reviewsLiked()->detach([$this->user->id, $review->id]);
                    $review->likes--;
                }
                $this->user->reviewsDisliked()->attach($this->user->id, ["review_id" => $review->id]);
                $review->dislikes++;
                $review->save();
            }

        }
    }
}
