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

            data = response.events;
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
            property: 'id_event',
            label: 'ID',
            sortable: true
          },
          {
            property: 'title',
            label: 'Título',
            sortable: true
          },
          {
            property: 'image_video',
            label: 'Poster evento',
            sortable: false
          },
          {
            property: 'video',
            label: 'Video',
            sortable: false
          },
          {
            property: 'name_category',
            label: 'Categoria',
            sortable: true
          },
          {
            property: 'name_city',
            label: 'Ciudad',
            sortable: true
          },
          {
            property: 'name_country',
            label: 'Pais',
            sortable: true
          },
          {
            property: 'date_open',
            label: 'Fecha Inicio',
            sortable: true
          },
          {
            property: 'date_end',
            label: 'Fecha Fin',
            sortable: true
          },
          {
            property: 'vip',
            label: 'VIP',
            sortable: true
          },
          {
            property: 'status',
            label: 'Estado',
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
              //console.log(item);
              var url_edit = $('#url_edit').val();
              var url_delete = $('#url_delete').val();
              var upload_slider = $('#url_upload').val();
              var url_active = $('#url_active').val();
              var url_desactive = $('#url_desactive').val();
              var url_modal = $('#url_modal').val();
              var url_vip = $('#url_vip').val();
              var url_notvip = $('#url_notvip').val();
              // Estado de item
              if(item.status==1){
                item.status = '<a href="'+url_desactive+item.id_event+'" class="btn btn-sm btn-icon btn-success"><i class="fa fa-check-circle"></i></a>';
              }else{
                item.status = '<a href="'+url_active+item.id_event+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-times-circle"></i></a>';
              }
              // cartel de evento
              if(item.image_video==null || item.image_video==""){
                item.image_video = "No hay Imagen";
              }else{
              	item.image_video = '<span class=""><img src="'+upload_slider+item.image_video+'" class="img-rounded" style="width:100px"></span>';
              }
              // video si existe
              if(item.video == null || item.video == ""){
                item.video = "No hay video";
              }else{
                item.video='<span class="thumb"><img src="http://img.youtube.com/vi/'+item.video+'/2.jpg" class="img-rounded"></span>';
              }
              // VIP de item
              if(item.vip==1){
                item.vip = '<a href="'+url_notvip+item.id_event+'" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-star"></i></a>';
              }else{
                item.vip = '<a href="'+url_vip+item.id_event+'" class="btn btn-sm btn-icon btn-default"><i class="fa fa-star-o"></i></a>';
              }
              // options de item
              item.options = '<a href="'+url_edit+item.id_event+'" class="btn btn-sm btn-icon btn-info"><i class="fa fa-pencil"></i></a> <a href="'+url_delete+item.id_event+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a> ';
            });
          }
      })
      });
    });

  });
}(window.jQuery);