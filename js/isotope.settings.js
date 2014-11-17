jQuery(document).ready(function($){

var container = document.querySelector('#innermain')
// init
var iso = new Isotope( container, {
  // options
  itemSelector: '.history-portrait',
  layoutMode: 'masonry'
        });
        
        
// Clear all checkboxes
    $('.filter-clear a').click(function () {
        $('.filter-boxes input:checked').removeAttr('checked');
        var clear = '*';
        iso.arrange({ filter: clear });
        $('.tag-stack li:has(input:checkbox:not(:checked))').removeClass('active');
        return false;
    });
    
    $checkboxes = $('.filter-boxes input');//id of div that contains all check boxes
    
    $checkboxes.change(function () {
        var filters = [];
        // get checked checkboxes values
        $checkboxes.filter(':checked').each(function () {
            filters.push(this.value);
        });

        filters = filters.join('');
        iso.arrange({ filter: filters });
    });   
    
    // Highlight currently checked boxes    
    $('.tax-stack input:checkbox').click(function () {
        $('.tax-stack li:has(input:checkbox:checked)').addClass('active');
    $('.tax-stack li:has(input:checkbox:not(:checked))').removeClass('active');
    });

});

   



