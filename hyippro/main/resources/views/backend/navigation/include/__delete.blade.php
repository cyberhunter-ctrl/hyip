<div
    class="modal fade"
    id="deleteMenu"
    tabindex="-1"
    aria-labelledby="deleteMenu"
    aria-hidden="true"
>
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content site-table-modal">
            <div class="modal-body popup-body">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="popup-body-text centered">
                    <div class="info-icon">
                        <i icon-name="alert-triangle"></i>
                    </div>
                    <div class="title">
                        <h4>{{ __('Are you sure?') }}</h4>
                    </div>
                    <p>
                        {{ __('You want to delete') }} <strong>{{ __('This') }}</strong>?
                    </p>
                    <div class="action-btns">
                        <form action="{{ route('admin.navigation.menu.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" class="menuId">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __('Confirm') }}
                            </button>
                            <a href="" class="site-btn-sm red-btn" type="button" data-bs-dismiss="modal"
                               aria-label="Close"><i icon-name="x"></i>{{ __('Cancel') }}</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
