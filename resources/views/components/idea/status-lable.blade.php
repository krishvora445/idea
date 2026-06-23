@props([
    'status' => 'pending'
])

@php

  $classes = 'inline-block rounded-full border px-2 py-1 text-xs font-medium ';

//    switch ($slot->toString()) {
//            case 'Open':
//                $classes .= 'bg-green-500/10 text-green-500 border-green-500/20';
//                break;
//            case 'In Progress':
//                $classes .= 'bg-blue-500/10 text-blue-500 border-blue-500/20';
//                break;
//            case 'Closed':
//                $classes .= 'bg-red-500/10 text-red-500 border-red-500/20';
//                break;
//            default:
//                $classes .= 'bg-gray-500/10 text-gray-500 border-gray-500/20';
//                break;
//        }

        if($status === 'pending'){

            $classes .= ' bg-yellow-500/10 text-yellow-500 border-yellow-500/20';
        }
       if($status === 'in_progress'){

            $classes .= ' bg-blue-500/10 text-blue-500 border-blue-500/20';
        }
       if($status === 'completed'){

            $classes .= ' bg-green-500/10 text-green-500 border-green-500/20';
        }

@endphp


<span {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</span>
