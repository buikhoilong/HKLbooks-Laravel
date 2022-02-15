DB::table('accounts')->DB::insert([
@for ($i = 0; $i < $accounts->count(); $i++)
    <br>[
        <br>'Id' => '{{ $accounts[$i]->Id }}',
        <br>'Name' => '{{ $accounts[$i]->Name }}',
        <br>'Birthday' => @if ($accounts[$i]->Birthday == null) null, @else '{{ $accounts[$i]->Birthday }}', @endif
        <br>'Address' => '{{ $accounts[$i]->Address }}',
        <br>'Phone' => '{{ $accounts[$i]->Phone }}',
        <br>'Status' => '{{ $accounts[$i]->Status }}',
        <br>'Email' => '{{ $accounts[$i]->Email }}',
        <br>'password' => Hash::make('12345678'),
        <br>'Role' => '{{ $accounts[$i]->Role }}',
        <br>'Avatar' => '{{ $accounts[$i]->Avatar }}',
        <br>],
        <br>
    @endfor
    ]);

    
    {{-- DB::table('books')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'Id' => '{{ $accounts[$i]->Id }}',
            <br>    'Name' => '{{ $accounts[$i]->Name }}',
            <br>    'Price' => '{{ $accounts[$i]->Price }}',
            <br>    'Stock' => '{{ $accounts[$i]->Stock }}',
            <br>    'SaleOff' => @if ($accounts[$i]->SaleOff == null) null, @else '{{ $accounts[$i]->SaleOff }}', @endif
            <br>    'SaleOffStart' => @if ($accounts[$i]->SaleOffStart == null) null, @else '{{ $accounts[$i]->SaleOffStart }}', @endif
            <br>    'SaleOffEnd' => @if ($accounts[$i]->SaleOffEnd == null) null, @else '{{ $accounts[$i]->SaleOffEnd }}', @endif
            <br>    'ImgPath' => '{{ $accounts[$i]->ImgPath}}',
            <br>   'Detail' => @if ($accounts[$i]->Detail == null) null, @else '{{ $accounts[$i]->Detail }}', @endif
            <br>    'Author' => '{{ $accounts[$i]->Author }}',
            <br>   'Publisher' => '{{ $accounts[$i]->Publisher }}',
            <br>    'CategoryId' => '{{ $accounts[$i]->CategoryId }}',
            <br>    'Status' => '{{ $accounts[$i]->Status}}',
            <br>],
        <br>
        @endfor
    ]); --}}


    {{-- DB::table('favourites')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'Id' => '{{ $accounts[$i]->Id }}',
            <br>    'AccountId' => '{{ $accounts[$i]->AccountId }}',
            <br>    'BookId' => '{{ $accounts[$i]->BookId }}',
            <br>],
        <br>
        @endfor
    ]); --}}

    {{-- DB::table('orders')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'Id' => '{{ $accounts[$i]->Id }}',
            <br>    'AccountId' => '{{ $accounts[$i]->AccountId }}',
            <br>    'TotalOrder' => '{{ $accounts[$i]->TotalOrder }}',
            <br>    'Discount' => '{{ $accounts[$i]->Discount }}',
            <br>    'TotalMoney' => '{{ $accounts[$i]->TotalMoney }}',
            <br>    'StatusId' => '{{ $accounts[$i]->StatusId }}',
            <br>],
        <br>
        @endfor
    ]); --}}

    {{-- DB::table('order_lines')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'Id' => '{{ $accounts[$i]->Id }}',
            <br>    'OrderId' => '{{ $accounts[$i]->OrderId }}',
            <br>    'BookId' => '{{ $accounts[$i]->BookId }}',
            <br>    'Quantity' => '{{ $accounts[$i]->Quantity }}',
            <br>    'Status' => '{{ $accounts[$i]->StatusId }}',
            <br>],
        <br>
        @endfor
    ]); --}}

    {{-- DB::table('promotes')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'PromoteId' => '{{ $accounts[$i]->PromoteId }}',
            <br>    'BookId' => '{{ $accounts[$i]->BookId }}',
            <br>],
        <br>
        @endfor
    ]); --}}

    {{-- DB::table('promote_types')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'Id' => '{{ $accounts[$i]->Id }}',
            <br>    'Name' => '{{ $accounts[$i]->Name }}',
            <br>    'Description' => '{{ $accounts[$i]->Description }}',
            <br>    'Status' => '{{ $accounts[$i]->Status }}',
            <br>],
            
        <br>
        @endfor
    ]); --}}

    {{-- DB::table('rates')->DB::insert([ 
        @for ($i = 0; $i < $accounts->count(); $i++)
        <br>[
            <br>    'Id' => '{{ $accounts[$i]->Id }}',
            <br>    'AccountId' => '{{ $accounts[$i]->AccountId }}',
            <br>    'BookId' => '{{ $accounts[$i]->BookId }}',
            <br>    'Star' => '{{ $accounts[$i]->Star }}',
            <br>    'Comment' => @if ($accounts[$i]->Comment == null) null, @else '{{ $accounts[$i]->Comment }}', @endif
            <br>    'Reply' => @if ($accounts[$i]->Reply == null) null, @else '{{ $accounts[$i]->Reply }}', @endif
            <br>    'Status' => '{{ $accounts[$i]->Status }}',
            <br>],
            
        <br>
        @endfor
    ]); --}}