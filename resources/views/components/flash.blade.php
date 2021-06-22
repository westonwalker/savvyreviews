@if (session('success'))
    <div class="max-w-7xl mx-auto">
        <x-flash-success></x-flash-success>
    </div>
@elseif (session('error'))
    <div class="max-w-7xl mx-auto">
        <x-flash-error></x-flash-error>
    </div>
@elseif (session('info'))
    <div class="max-w-7xl mx-auto">
        <x-flash-info></x-flash-info>
    </div>
@elseif (session('warning'))
    <div class="max-w-7xl mx-auto">
        <x-flash-warning></x-flash-warning>
    </div>
@endif
