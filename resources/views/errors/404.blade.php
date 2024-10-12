
@if (Request::is('admin/*'))
  @include('admin.errors.404');
@else
  <p>Sehife Tapılmadı</p>
@endif
