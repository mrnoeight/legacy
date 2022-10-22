<a href="{{ url('admin') }}" class="navbar-brand">
    {{-- You may use plain text as a logo instead of image --}}
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQ4IDc5LjE2NDAzNiwgMjAxOS8wOC8xMy0wMTowNjo1NyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIxLjAgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjY5Q0U4NzE2QTJCNjExRUM5QzMzOUFFRkM1QkI2NjZBIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjY5Q0U4NzE3QTJCNjExRUM5QzMzOUFFRkM1QkI2NjZBIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NjlDRTg3MTRBMkI2MTFFQzlDMzM5QUVGQzVCQjY2NkEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NjlDRTg3MTVBMkI2MTFFQzlDMzM5QUVGQzVCQjY2NkEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7fzgsJAAAHrUlEQVR42uxaaWxU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" alt="Craftable">

    {{--Text Logo--}}

</a>