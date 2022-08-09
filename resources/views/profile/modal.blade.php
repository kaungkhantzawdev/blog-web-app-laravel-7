
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="bi bi-info-circle me-2"></i>
                    Please add your information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="one" class="form-label">
                        <i class="bi bi-telephone me-2"></i>
                        Your Phone
                    </label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',Auth::user()->phone) }}" form="updatePa" name="phone" id="one">
                    @error('phone')
                    <small class="text-danger">
                        <strong>
                            {{ $message }}
                        </strong>
                    </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <i class="bi bi-geo-alt me-2"></i>
                        Address
                    </label>
                    <textarea class="form-control @error('address') is-invalid @enderror" form="updatePa" name="address" id="exampleFormControlTextarea1" rows="5">{{ old('address', Auth::user()->address) }}</textarea>
                    @error('address')
                    <small class="text-danger">
                        <strong>
                            {{ $message }}
                        </strong>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="updatePa" class="btn btn-primary">save</button>
            </div>
            <form action="{{ route('profile.updatePa') }}" method="post" class="d-none" id="updatePa">
                @csrf
            </form>
        </div>
    </div>
</div>
<script>
    let openModal = new bootstarp.Modal("#exampleModal");
    openModal.show();
</script>
