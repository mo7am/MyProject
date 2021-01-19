<footer class="main-footer">
    @if(App::isLocale('ar'))
        <div class="pull-left hidden-xs">
            <b>{{__('pageContent.footer_version')}}</b>
        </div>
    @elseif(App::isLocale('en'))
        <div class="pull-right hidden-xs">
            <b>{{__('pageContent.footer_version')}}</b>
        </div>

    @endif

    <strong>{{__('pageContent.footer_copyright')}} <a href="https://adminlte.io">{{ config('app.name') }}</a>.</strong> {{__('pageContent.footer_Allrights')}}
</footer>
