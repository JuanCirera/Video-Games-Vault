<div>
    @empty($following)
        <button class="btn bg-gradient-primary border-radius-2xl" wire:click.prevent="follow">
            Seguir
            <span class="spinner-border spinner-border-sm text-white" role="status" wire:loading wire:target="follow">
                <span class="visually-hidden">Loading...</span>
            </span>
        </button>
    @else
        <button class="btn btn-outline-secondary border-radius-2xl" wire:click.prevent="follow">
            {{-- <i class="fa-solid fa-user-minus"></i>  --}}
            Dejar de seguir
        </button>
    @endempty
</div>
