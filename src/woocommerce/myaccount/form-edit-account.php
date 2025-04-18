<?php
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account max-w-2xl mx-auto" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="grid sm:grid-cols-2 sm:gap-4">
		<p class="form-row">
			<input
				type="text"
				name="account_first_name"
				id="account_first_name"
				class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
				autocomplete="given-name"
				placeholder="Imię *"
				value="<?php echo esc_attr( $user->first_name ); ?>"
				aria-required="true"
			/>
		</p>

		<p class="form-row">
			<input
				type="text"
				name="account_last_name"
				id="account_last_name"
				class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
				autocomplete="family-name"
				placeholder="Nazwisko *"
				value="<?php echo esc_attr( $user->last_name ); ?>"
				aria-required="true"
			/>
		</p>
	</div>

	<p class="form-row mt-4">
		<input
			type="text"
			name="account_display_name"
			id="account_display_name"
			class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
			placeholder="Wyświetlana nazwa *"
			value="<?php echo esc_attr( $user->display_name ); ?>"
			aria-required="true"
		/>
		<span id="account_display_name_description" class="text-sm text-gray-1 mt-1 block">
			<em>W taki sposób twoja nazwa zostanie wyświetlona w sekcji Moje konto i w twoich opiniach</em>
		</span>
	</p>

	<p class="form-row mt-4">
		<input
			type="email"
			name="account_email"
			id="account_email"
			class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
			autocomplete="email"
			placeholder="Adres e-mail *"
			value="<?php echo esc_attr( $user->user_email ); ?>"
			aria-required="true"
		/>
	</p>

	<fieldset class="mt-8">
		<legend class="text-lg font-semibold text-text-color mb-2">Zmiana hasła</legend>

		<p class="form-row mt-4">
			<span class="password-input relative block">
				<input
					type="password"
					name="password_current"
					id="password_current"
					class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
					autocomplete="off"
					placeholder="Aktualne hasło"
				/>
				<button type="button" class="show-password-input absolute right-3 top-1/2 transform -translate-y-1/2" aria-label="Pokaż hasło" aria-describedby="password_current"></button>
			</span>
		</p>

		<p class="form-row mt-4">
			<span class="password-input relative block">
				<input
					type="password"
					name="password_1"
					id="password_1"
					class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
					autocomplete="off"
					placeholder="Nowe hasło"
				/>
				<button type="button" class="show-password-input absolute right-3 top-1/2 transform -translate-y-1/2" aria-label="Pokaż hasło" aria-describedby="password_1"></button>
			</span>
		</p>

		<p class="form-row mt-4">
			<span class="password-input relative block">
				<input
					type="password"
					name="password_2"
					id="password_2"
					class="w-full px-4 py-2 border border-gray-1 rounded-full bg-gray-3 text-text-color placeholder-gray-1 focus:outline-none focus:ring-2 focus:ring-primary"
					autocomplete="off"
					placeholder="Potwierdź nowe hasło"
				/>
				<button type="button" class="show-password-input absolute right-3 top-1/2 transform -translate-y-1/2" aria-label="Pokaż hasło" aria-describedby="password_2"></button>
			</span>
		</p>
	</fieldset>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p class="mt-6">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button
			type="submit"
			class="px-6 py-3 rounded-full font-bold text-base bg-primary text-white hover:bg-red transition-colors duration-300"
			name="save_account_details"
			value="<?php esc_attr_e( 'Zapisz zmiany', 'woocommerce' ); ?>"
		>
			<?php esc_html_e( 'Zapisz zmiany', 'woocommerce' ); ?>
		</button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
