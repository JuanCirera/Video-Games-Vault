<div>
    @empty($following)
        <button class="btn btn-primary" wire:click.prevent="follow">
            <i class="fas fa-user-plus"></i> Seguir
        </button>
    @else
        <button class="btn btn-primary" wire:click.prevent="follow">
            <i class="fa-solid fa-user-minus"></i> Dejar de seguir
        </button>
    @endempty
</div>
