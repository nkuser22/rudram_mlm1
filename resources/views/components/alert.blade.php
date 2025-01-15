<!-- <div class="alert alert-{{ $type ?? 'success' }} border-0 bg-{{ $type ?? 'success' }} alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white">
            <i class="{{ $icon ?? 'bx bxs-check-circle' }}"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">{{ $title ?? 'Success' }}</h6>
            <div class="text-white">{{ $slot }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->



<div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
<div class="d-flex align-items-center">
    <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
    </div>
    <div class="ms-3">
        <h6 class="mb-0 text-success">{{ $title ?? 'Success' }}</h6>
        <div>{{ $slot }}</div>
    </div>
</div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

