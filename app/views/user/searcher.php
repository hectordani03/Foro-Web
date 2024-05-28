<div class="searcher bg-gray-100 dark:bg-slate-700 relative w-10/12 xl:w-2/12 xl:mt-20 rounded-xl mx-auto flex justify-center shadow-lg order-first xl:order-last mb-20 xl-mb-0">
    <div class="absolute top-8 w-11/12 2xl:w-full mx-auto flex xl:flex-row flex-col justify-center">
        <input id="input_id" name="input" type="text" class="border-b-2 border-t-1 border-gray-300 dark:border-gray-500 py-1 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-gray-100 lg:bg-gray-200   xl:dark:bg-slate-800 rounded-full px-5 text-gray-400 font-semibold w-12/12 xl:w-11/12 dark:bg-slate-700" />
        <label for="input_id" class="relative cursor-text transition-all pl-7 text-gray-400 font-semibold order-first text-center mb-3 xl:absolute xl:left-0 xl:top-1">Search in the Forum</label>
    </div>
</div>

<script>
    const $input = document.getElementById('input_id')
    const $label = document.querySelector('.searcher label')
    $input.addEventListener('focus', () => {
        $label.classList.add('text-xs')
        $label.classList.add('-top-7')
        $label.classList.add('text-gray-400')
    })

    $input.addEventListener('blur', () => {
        if ($input.value === '') {
            $label.classList.remove('text-xs')
            $label.classList.remove('-top-7')
        }
    })

    // const searchInput = document.querySelector("[data-search]")
    // const titleElement = document.querySelectorAll("[data-title]")

    // searchInput.addEventListener("input", e => {
    //     const value = e.target.value.toLowerCase()
    //     titleElement.forEach(title => {
    //         const ti = title.querySelector("h1").textContent.toLowerCase()
    //         const header = Array.from(title.querySelectorAll("h2")).map(h => h.textContent.toLowerCase())
    //         const isVisible = ti.includes(value) || header.some(h => h.includes(value))
    //         title.classList.toggle("hide", !isVisible)
    //     })
    // })
</script>