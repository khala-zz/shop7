$(function() {

    $(document).on("click", "#btn-add-feature" , function(e) {
        e.preventDefault();
    	
    	//id: Math.floor(Math.random() * 1000), field_title: '', field_type: 1, category_id: ''
    	let id = Math.floor(Math.random() * 10000);
    	
    	let structure = $('<div class="row container-feature-' + id + '" v-for="feature in this.features"  :key="feature.id" style="margin-bottom: 5px;"><div class="col-lg-4"><input type="text" name="field_title[]" class="form-control" @change="updateFieldTitle($event, feature.id)" :value="feature.field_title" placeholder="Feature title" /></div><div class="col-lg-4"><select name="field_type[]" class="form-control" @change="updateFieldType($event, feature.id)" :value="feature.field_type"><option value="1">Text</option><option value="2">Color</option></select></div><div class="col-lg-4"><a href="#" class="btn btn-sm btn-danger remove-feature" data-value='+ id + '><i class="fa fa-remove"></i></a></div></div>');
        $('#frame-feature').append(structure);

    	
    });

    $(document).on("click", ".remove-feature" , function(e) {
        e.preventDefault();
        //get id thong qua thuoc tinh data-value o html
    	let id = $(this).data('value');
    	$(".container-feature-" + id).remove();
    });
});