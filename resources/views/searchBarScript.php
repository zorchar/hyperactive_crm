<script type="text/javascript">
    function searchBarOnInputHandler(target) {
        const inputText = target.value

        document.querySelector('#auto-complete').replaceChildren()
        const users = <?php echo $users; ?>;

        users.forEach(student => {
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
</script>