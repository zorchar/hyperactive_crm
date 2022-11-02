<script type="text/javascript">
    function cellOnClickHandler(e) {
        if (e?.target?.classList.contains('cell'))
            document.querySelector('#search').value = e.target.innerText
        if (document.querySelector('#auto-complete'))
            document.querySelector('#auto-complete').replaceChildren()
    }
</script>