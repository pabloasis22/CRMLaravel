@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
<script>

    $(document).ready(function() {
        // Agregar animación Intersection Observer para elementos
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });

            document.querySelectorAll('.card, .alert, .info-box').forEach(function(el) {
                observer.observe(el);
            });
        }

        // Agregar efecto ripple a botones
        $('button, a.btn').on('click', function(e) {
            const ripples = $('<span class="ripple"></span>');
            $(this).append(ripples);
            const d = Math.max($(this).outerWidth(), $(this).outerHeight());
            ripples.css({
                height: d,
                width: d,
                top: e.offsetY - d / 2,
                left: e.offsetX - d / 2
            }).addClass('animate');
            
            setTimeout(function() {
                ripples.remove();
            }, 600);
        });

        // Animación de números incrementales en widgets
        $('[data-number]').each(function() {
            const target = $(this);
            const start = 0;
            const end = parseInt(target.attr('data-number'));
            const duration = 1500;
            const increment = end / (duration / 10);
            let current = start;

            const timer = setInterval(function() {
                current += increment;
                if (current >= end) {
                    current = end;
                    clearInterval(timer);
                }
                target.text(Math.floor(current));
            }, 10);
        });
    });

</script>
<style>
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
</style>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<link rel="stylesheet" href="{{ asset('css/custom-theme.css') }}">
<style type="text/css">

    {{-- You can add AdminLTE customizations here --}}
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

</style>
@endpush