

@foreach ($categories as $category)
    <li>
        <a href="{{ route('fe.category_product', $category->id) }}">
            {{ $category->name }}
            @if ($category->childrenCategories->isNotEmpty())
               
            @endif
        </a>
 
        @if ($category->products->isNotEmpty())
          
        @endif
      
        @if ($category->childrenCategories->isNotEmpty())
            <ul class="submenu">
                @include('partials.category', ['categories' => $category->childrenCategories])
            </ul>
        @endif
    </li>
@endforeach
