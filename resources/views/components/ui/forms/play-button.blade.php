@props(['label','type'])

<span class="flex items-center gap-1">
  @if ($type=='create')
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="" viewBox="0 0 24 24"><!-- Icon from Material Symbols Light by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M18.25 10.5h-2.5q-.213 0-.356-.144t-.144-.357t.144-.356t.356-.143h2.5V7q0-.213.144-.356t.357-.144t.356.144t.143.356v2.5h2.5q.213 0 .356.144t.144.357t-.144.356t-.356.143h-2.5V13q0 .213-.144.356t-.357.144t-.356-.144T18.25 13zM9 11.385q-1.237 0-2.119-.882T6 8.385t.881-2.12T9 5.386t2.119.88t.881 2.12t-.881 2.118T9 11.385m-7 6.192v-.608q0-.619.36-1.158q.361-.54.97-.838q1.416-.679 2.834-1.018q1.417-.34 2.836-.34t2.837.34t2.832 1.018q.61.298.97.838q.361.539.361 1.158v.608q0 .44-.299.74q-.299.298-.74.298H3.04q-.441 0-.74-.299t-.3-.739m1 .039h12v-.647q0-.332-.215-.625q-.214-.292-.593-.494q-1.234-.598-2.545-.916T9 14.616t-2.646.318t-2.546.916q-.38.202-.593.494Q3 16.637 3 16.97zm6-7.231q.825 0 1.413-.588T11 8.384t-.587-1.412T9 6.384t-1.412.588T7 8.384t.588 1.413T9 10.384m0 7.232"/>
    </svg>
  @elseif ($type=='createItem')
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols Light by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M11.5 16.5h1v-4h4v-1h-4v-4h-1v4h-4v1h4zm.503 4.5q-1.867 0-3.51-.708q-1.643-.709-2.859-1.924t-1.925-2.856T3 12.003t.709-3.51Q4.417 6.85 5.63 5.634t2.857-1.925T11.997 3t3.51.709q1.643.708 2.859 1.922t1.925 2.857t.709 3.509t-.708 3.51t-1.924 2.859t-2.856 1.925t-3.509.709M12 20q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
  @endif

  {{__($label)}}
</span>
