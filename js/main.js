$(document).ready(function(){

	/*  Show/Hidden Submenus */
	$('.nav-btn-submenu').on('click', function(e){
		e.preventDefault();
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.fa-chevron-down');
		if(SubMenu.hasClass('show-nav-lateral-submenu')){
			$(this).removeClass('active');
			iconBtn.removeClass('fa-rotate-180');
			SubMenu.removeClass('show-nav-lateral-submenu');
		}else{
			$(this).addClass('active');
			iconBtn.addClass('fa-rotate-180');
			SubMenu.addClass('show-nav-lateral-submenu');
		}
	});

	/*  Show/Hidden Nav Lateral */
	$('.show-nav-lateral').on('click', function(e){
		e.preventDefault();
		var NavLateral=$('.nav-lateral');
		var PageConten=$('.page-content');
		if(NavLateral.hasClass('active')){
			NavLateral.removeClass('active');
			PageConten.removeClass('active');
		}else{
			NavLateral.addClass('active');
			PageConten.addClass('active');
		}
	});

	/*  Exit system buttom */
	$('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		Swal.fire({
			title: 'Você deseja sair do sistema?',
			text: "Você irá encerrar a sessão e voltará para tela inicial.",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sim, sair!',
			cancelButtonText: 'Não, cancelar'
		}).then((result) => {
			if (result.value) {
				window.location="http://localhost/Projeto_final/index.php";
			}
		});
	});
});
/*  Exit system buttom */
$('.btn-delete-usuario').on('click', function(e){
	var href = $(this).attr('href');
	if(!$('#confirm-delete').length){
	e.preventDefault();
	Swal.fire({
		title: 'Você deseja apagar o usuário?',
		text: "Você irá apagar todos os dados deste usário.",
		type: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim, confirmar!',
		cancelButtonText: 'Não, cancelar'
	}).then((result) => {
		if (result.value == true) {
			window.location.href = "user-delete.php?id="+id;
		}
	})
	};
});

(function($){
    $(window).on("load",function(){
        $(".nav-lateral-content").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".page-content").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);