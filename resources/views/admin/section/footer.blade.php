<footer class="site-footer">
  <div class="text-center" style="font-weight: bold;">
    {{ (date('Y')) }} &copy; @if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif.@if(isset(Auth::user()->last_login_at)) Your IP Address is {{ Auth::user()->last_login_ip }}<strong></strong>@endif
  </div>
</footer>