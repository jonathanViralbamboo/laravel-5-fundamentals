@if (Session::has('flash_message'))
  <!-- Do you have 'flash_message' in the session, if we do, get 'flash_message' -->
  <!-- If the session has an important message, add the 'alert-important' class, else add nothing -->
  <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : ''}}">
    @if (Session::has('flash_message_important'))
      <!-- only display close button if the message is important -->
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    @endif

    {{ session('flash_message') }}
  </div>
@endif
