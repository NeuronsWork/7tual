!function ($) {

  $(function(){

    // fuelux datagrid
    var DataGridDataSource = function (options) {
      this._formatter = options.formatter;
      this._columns = options.columns;
      this._delay = options.delay;
    };

    DataGridDataSource.prototype = {

      columns: function () {
        return this._columns;
      },

      data: function (options, callback) {
        var url = $('#current_url').val();
        var self = this;

        setTimeout(function () {

          var data = $.extend(true, [], self._data);

          $.ajax(url, {
            dataType: 'json',
            async: false,
            type: 'GET'
          }).done(function (response) {

            data = response.sliders;
            // SEARCHING
            if (options.search) {
              data = _.filter(data, function (item) {
                var match = false;

                _.each(item, function (prop) {
                  if (_.isString(prop) || _.isFinite(prop)) {
                    if (prop.toString().toLowerCase().indexOf(options.search.toLowerCase()) !== -1) match = true;
                  }
                });

                return match;
              });
            }

            var count = data.length;

            // SORTING
            if (options.sortProperty) {
              data = _.sortBy(data, options.sortProperty);
              if (options.sortDirection === 'desc') data.reverse();
            }

            // PAGING
            var startIndex = options.pageIndex * options.pageSize;
            var endIndex = startIndex + options.pageSize;
            var end = (endIndex > count) ? count : endIndex;
            var pages = Math.ceil(count / options.pageSize);
            var page = options.pageIndex + 1;
            var start = startIndex + 1;

            data = data.slice(startIndex, endIndex);

            if (self._formatter) self._formatter(data);

            callback({ data: data, start: start, end: end, count: count, pages: pages, page: page });
          }).fail(function(e){

          });
        }, self._delay);
      }
    };

    $('#MyStretchGrid').each(function() {
      $(this).datagrid({
          dataSource: new DataGridDataSource({
          // Column definitions for Datagrid
          columns: [
          {
            property: 'id_slider',
            label: 'ID',
            sortable: true
          },
          {
            property: 'title',
            label: 'Título',
            sortable: true
          },
          {
            property: 'image',
            label: 'Image',
            sortable: true
          },
          {
            property: 'id_video',
            label: 'Video',
            sortable: true
          },
          {
            property: 'status',
            label: 'Estado',
            sortable: true
          },
          {
            property: 'code_country',
            label: 'Paises',
            sortable: true
          },
          {
            property: 'options',
            label: 'Edit',
            sortable: true
          }
        ],

          // Create IMG tag for each returned image
          formatter: function (items) {
            $.each(items, function (index, item) {
              console.log(item);
              var url_edit = $('#url_edit').val();
              var url_delete = $('#url_delete').val();
              var upload_slider = $('#url_upload_slider').val();
              var url_active = $('#url_active').val();
              var url_desactive = $('#url_desactive').val();
              var url_modal = $('#url_modal').val();
              // Estado de item
              if(item.status==1){
                item.status = '<a href="'+url_desactive+item.id_slider+'" class="btn btn-sm btn-icon btn-success"><i class="fa fa-check-circle"></i></a>';
              }else{
                item.status = '<a href="'+url_active+item.id_slider+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-times-circle"></i></a>';
              }
              // image de slider
              item.image = '<span class=""><img src="'+upload_slider+'thumbs/'+item.image_background+'" class="img-rounded"></span>';
              // video de slider si existe
              if(item.id_video==null || item.id_video==""){
                item.id_video = "No hay video";
              }else{
                item.id_video='<span class="thumb"><img src="'+upload_slider+'/'+item.imagen+'" class="img-rounded"></span>';
              }
              //  paises
              item.code_country = '<a href="'+url_modal+item.id_slider+'" data-toggle="ajaxModal" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-random"></i></a>';
              item.like = item.like+' Like';
              // options de item
              item.options = '<a href="'+url_edit+item.id_slider+'" class="btn btn-sm btn-icon btn-info"><i class="fa fa-pencil"></i></a> <a href="'+url_delete+item.id_slider+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a> ';
            });
          }
      })
      });
    });

  });
}(window.jQuery);