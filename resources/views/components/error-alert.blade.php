<div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-danger">
            <i class="bx bxs-message-square-x"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-danger">{{ $title ?? 'error' }}</h6>
            <div>{{ $message }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
