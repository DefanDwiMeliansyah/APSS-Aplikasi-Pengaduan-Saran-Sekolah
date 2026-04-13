@props([
    'name',
    'label' => null,
    'options' => [],
    'value' => null,
    'placeholder' => 'Ketik untuk mencari...',
    'valueField' => 'id',
    'labelField' => null,
])

@php
    $uniqueId = 'searchable_' . $name . '_' . uniqid();
    $selectedValue = old($name, $value);
    $selectedLabel = '';
    if ($selectedValue) {
        foreach ($options as $option) {
            if ($option->{$valueField} == $selectedValue) {
                $selectedLabel = $labelField ? $option->{$labelField} : (string) $option;
                break;
            }
        }
    }
@endphp

<div class="searchable-select" id="{{ $uniqueId }}" style="position:relative;">
    {{-- Hidden input for actual form value --}}
    <input type="hidden" name="{{ $name }}" value="{{ $selectedValue }}" id="{{ $uniqueId }}_value">

    {{-- Visible search input --}}
    <div style="position:relative;">
        <input
            type="text"
            autocomplete="off"
            placeholder="{{ $placeholder }}"
            value="{{ $selectedLabel }}"
            id="{{ $uniqueId }}_search"
            class="form-select {{ $errors->has($name) ? 'is-invalid' : '' }}"
            style="width:100%;padding:.5rem .75rem;padding-right:2rem;border:1px solid var(--gray-200, #e5e7eb);border-radius:.375rem;font-size:.875rem;background:white;cursor:text;"
        >
        {{-- Dropdown arrow icon --}}
        <span style="position:absolute;right:.65rem;top:50%;transform:translateY(-50%);pointer-events:none;color:var(--gray-400, #9ca3af);font-size:.75rem;">
            <i class="bi bi-chevron-down"></i>
        </span>
    </div>

    {{-- Dropdown list --}}
    <div id="{{ $uniqueId }}_dropdown"
         style="display:none;position:absolute;top:100%;left:0;right:0;z-index:50;
                max-height:200px;overflow-y:auto;
                background:white;border:1px solid var(--gray-200, #e5e7eb);
                border-radius:.375rem;margin-top:.25rem;
                box-shadow:0 4px 6px -1px rgba(0,0,0,.1),0 2px 4px -2px rgba(0,0,0,.1);">
        @foreach ($options as $option)
            <div class="searchable-select__option"
                 data-value="{{ $option->{$valueField} }}"
                 data-label="{{ $labelField ? $option->{$labelField} : $option }}"
                 style="padding:.5rem .75rem;font-size:.875rem;cursor:pointer;color:var(--gray-700, #374151);
                        transition:background .15s;"
                 onmouseenter="this.style.background='var(--primary-light, #e0e7ff)'"
                 onmouseleave="this.style.background='white'">
                {{ $labelField ? $option->{$labelField} : $option }}
            </div>
        @endforeach
        <div class="searchable-select__empty"
             style="display:none;padding:.75rem;text-align:center;font-size:.85rem;color:var(--gray-400, #9ca3af);">
            Tidak ditemukan
        </div>
    </div>

    @error($name)
        <div style="color:var(--danger, #ef4444);font-size:.875rem;margin-top:.25rem;">
            {{ $message }}
        </div>
    @enderror
</div>

<script>
(function() {
    const container = document.getElementById('{{ $uniqueId }}');
    const searchInput = document.getElementById('{{ $uniqueId }}_search');
    const hiddenInput = document.getElementById('{{ $uniqueId }}_value');
    const dropdown = document.getElementById('{{ $uniqueId }}_dropdown');
    const options = dropdown.querySelectorAll('.searchable-select__option');
    const emptyMsg = dropdown.querySelector('.searchable-select__empty');

    function showDropdown() {
        dropdown.style.display = 'block';
        filterOptions();
    }

    function hideDropdown() {
        setTimeout(() => { dropdown.style.display = 'none'; }, 150);
    }

    function filterOptions() {
        const query = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        options.forEach(opt => {
            const label = opt.dataset.label.toLowerCase();
            if (label.includes(query)) {
                opt.style.display = 'block';
                visibleCount++;
            } else {
                opt.style.display = 'none';
            }
        });

        emptyMsg.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Show dropdown on focus
    searchInput.addEventListener('focus', showDropdown);
    searchInput.addEventListener('click', showDropdown);

    // Filter as user types
    searchInput.addEventListener('input', function() {
        hiddenInput.value = '';  // Clear selected value when typing
        filterOptions();
    });

    // Hide dropdown on blur
    searchInput.addEventListener('blur', function() {
        hideDropdown();
        // If no value selected, clear the search text
        if (!hiddenInput.value) {
            searchInput.value = '';
        }
    });

    // Select option on click
    options.forEach(opt => {
        opt.addEventListener('mousedown', function(e) {
            e.preventDefault(); // Prevent blur
            hiddenInput.value = this.dataset.value;
            searchInput.value = this.dataset.label;
            dropdown.style.display = 'none';
        });
    });
})();
</script>
