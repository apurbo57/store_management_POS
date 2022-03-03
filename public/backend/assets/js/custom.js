

  function convertToSlug(text, place) {
    text = text.toLowerCase();
    text = text.replace(/[^a-zA-Z0-9]+/g, '-');
      $(place).val(text);
  }

  $(document).ready(function(){

    $("#yes_sp").click(function() {
        $(".special_details").slideToggle();
    });

    $("#yes").click(function() {
        $(".wrrantyshow").slideToggle();
    });
});

$(document).on('click','#checkall', function () {
    if (this.checked) {
        $('.checkbox-item').each(function () {
            this.checked = true;
        })
    }else{
        $('.checkbox-item').each(function () {
            this.checked = false;
        })
    }
})

$(document).on('click', '.checkbox-item', function () {
    if ($('.checkbox-item').length === $('.checkbox-item:checked').length) {
        $('#checkall').prop('checked', true);
    }else{
        $('#checkall').prop('checked', false);
    }
})


