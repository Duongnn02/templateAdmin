<footer class="footer bg-light">
    <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
      <div>
        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/landing/" target="_blank" class="footer-text fw-bolder">Sneat</a> ©
      </div>
      <div>
        {{-- <div class="form-check form-control-sm footer-link me-3">
          <input class="form-check-input" type="checkbox" value="" id="customCheck2" checked="">
          <label class="form-check-label" for="customCheck2">
            Show
          </label>
        </div> --}}
        <div class="dropdown dropup footer-link me-3">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{auth()->user()->name}}
          </button>
          {{-- <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-bitcoin"></i> </a>
          </div> --}}
        </div>
        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger">
            <i class="bx bx-log-out-circle"></i> Logout
        </a>
      </div>
    </div>
    <div class="float-contact">
        <div class="chat-zalo">
            <a href="https://zalo.me/0368563954" target="_blank"><img title="Chat Zalo" src="{{asset('assets/img/contact-button/zalo-icon.png')}}" alt="zalo-icon" width="40" height="40" /></a>
        </div>
        <div class="chat-facebook">
            <a href="https://m.me/wpcanban" target="_blank"><img title="Chat Facebook" src="{{asset('assets/img/contact-button/facebook-icon.png')}}" alt="facebook-icon" width="40" height="40" /></a>
        </div>
        <div class="call-hotline">
            <a href="tel:0123456789"><img title="Call Hotline" src="{{asset('assets/img/contact-button/phone-icon.png')}}" alt="phone-icon" width="40" height="40" /></a>
        </div>
    </div>
  </footer>
