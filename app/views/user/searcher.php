<div class="searcher bg-gray-100 dark:bg-slate-700 relative w-2/12 mt-20 rounded-xl mx-auto flex justify-center shadow-lg">
            <div class="absolute top-8 w-11/12 2xl:w-full mx-auto flex justify-center">
                <input
                id="input_id"
                name="input"
                type="text"
                class="border-b-2 border-t-1 border-gray-300 dark:border-gray-500 py-1 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-gray-200 dark:bg-slate-800 rounded-full px-5 text-gray-400 font-semibold w-11/12"
                />
                <label
                for="input_id"
                class="absolute left-0 top-1 cursor-text transition-all pl-7 text-gray-400 font-semibold"
                >Search in the Forum</label
                >
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
                if ($input.value === ''){
                    $label.classList.remove('text-xs')
                    $label.classList.remove('-top-7')
                }
            })
           </script>
        