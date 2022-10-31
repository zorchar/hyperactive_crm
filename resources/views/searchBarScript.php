<!-- <script type="text/javascript">
    const searchBar = document.querySelector('#search')
    searchBar.addEventListener('input', (e) => {
        const inputText = e.target.value

        document.querySelector('#auto-complete').replaceChildren()
        const students = <?php echo $students; ?>;

        students.forEach(student => {
            const studentName = student.first_name + " " + student.last_name

            if (inputText != "" && studentName.toUpperCase().includes(inputText.toUpperCase())) {
                const cell = document.createElement('div');
                const cellText = document.createElement('div');
                cellText.innerText = studentName
                cellText.classList.add('cell')
                cell.appendChild(cellText)
                return document.querySelector('#auto-complete').appendChild(cell)
            }
        })
    })

    const autoComplete = document.querySelector('#auto-complete')
    autoComplete.addEventListener('click', (e) => {
        if (e.target.classList.contains('cell')) {
            searchBar.value = e.target.innerText
            document.querySelector('#auto-complete').replaceChildren()
        }
    })
</script> -->


<!-- No addEventListener -->

<script type="text/javascript">
    function searchBarOnInputHandler(target) {
        const inputText = target.value

        document.querySelector('#auto-complete').replaceChildren()
        const students = <?php echo $students; ?>;

        students.forEach(student => {
            const studentName = student.first_name + " " + student.last_name

            if (inputText != "" && studentName.toUpperCase().includes(inputText.toUpperCase())) {
                const cell = document.createElement('div');
                const cellText = document.createElement('div');

                cellText.innerText = studentName
                cellText.classList.add('cell')
                cell.onclick = cellOnClickHandler

                cell.appendChild(cellText)

                return document.querySelector('#auto-complete').appendChild(cell)
            }
        })
    }

    function cellOnClickHandler(e) {
        document.querySelector('#search').value = e.target.innerText
        document.querySelector('#auto-complete').replaceChildren()
    }
</script>