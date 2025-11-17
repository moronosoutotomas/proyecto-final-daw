import.meta.glob([
	'../fonts/**',
]);

// función para aplicar el tema
function applyTheme(theme) {
	const html = document.documentElement;
	
	if (theme === 'system' || !theme) {
		// por defecto cargamos el tema que tenga el user en el navegador
		const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
		if (systemPrefersDark) {
			html.classList.add('dark');
		} else {
			html.classList.remove('dark');
		}
	} else if (theme === 'dark') {
		html.classList.add('dark');
	} else {
		html.classList.remove('dark');
	}
}

// inicializar tema on load
document.addEventListener('DOMContentLoaded', function() {
	const theme = document.documentElement.getAttribute('data-theme') || 'system';
	applyTheme(theme);
	
	// escuchar cambios en la preferencia del sistema (solo si el tema es 'system')
	const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
	mediaQuery.addEventListener('change', (e) => {
		const currentTheme = document.documentElement.getAttribute('data-theme') || 'system';
		if (currentTheme === 'system') {
			applyTheme('system');
		}
	});
});

// escuchamos el evento de Livewire cuando se actualiza el tema
// para recargar la página y aplicar el nuevo tema
document.addEventListener('livewire:init', () => {
	Livewire.on('theme-updated', () => {
		window.location.reload();
	});
});