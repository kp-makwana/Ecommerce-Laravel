function submit() {
    $('#sortingForm').submit();
}

$('#category,#brands,#rating,#sorting,#no_of_record').change(function () {
    submit();
});
