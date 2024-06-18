<!-- card.blade.php -->
<article class="card hover:bg-blue-400 hover:text-white rounded shadow transition-all p-5 cursor-pointer"
    :href="{{ $href }}">
    <header class="card-header text-6xl pb-4">
        {{ $header }}
    </header>
    <div class="card-body">
        {{ $body }}
    </div>
    <script>
        const card = document.querySelector('.card');
        card.addEventListener('click', function() {
            window.location.href = card.getAttribute('href');
        });
    </script>
</article>
