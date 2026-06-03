@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-700 bg-slate-900/90 text-slate-100 placeholder:text-slate-500 focus:border-orange-400 focus:ring-orange-400 rounded-md shadow-sm']) }}>
