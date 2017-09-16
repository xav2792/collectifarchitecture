<?php

if( ! class_exists( 'CustomAdminMenu' ) ){

	class CustomAdminMenu extends AdminMenu{

		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $menus;

		public function __construct() {
			global $adminMenu, $menu, $submenu;
			//parent::__construct();
			if( $adminMenu ) {
				$this->plugin_dir = $adminMenu->plugin_dir;
		        $this->plugin_url = $adminMenu->plugin_url;
				$this->version = $adminMenu->version;
				$this->options = $adminMenu->options;
			}

			add_filter( 'cam_form', array( $this, 'admin_menu_form' ), 14 );
			add_action( 'admin_menu', array( $this, 'rename_plugin_menu' ) );
			add_filter( 'custom_menu_order', array( $this, 'custom_menu_order' ), 1001 );
			add_filter( 'menu_order', array( $this, 'custom_menu_order' ), 1001 );
		}

		public function rename_plugin_menu() {
			global $menu;

			if( isset( $this->options['menu_rename'] ) ) {
				$ren = $this->options['menu_rename'];
				//var_dump($ren);
				foreach ( $menu as $n => $item ) {
					foreach( $ren as $k => $v ){
						if( $item[2] == $k && $v != '' ){
							$menu[$n][0] = $v;
						}
					}
				}
			}

			$this->menus = $menu;
			foreach ( $this->menus as $m ) {
				if( isset( $this->options['hide_menu'][$m[2]] ) && $this->options['hide_menu'][$m[2]] == 'on' ){
					remove_menu_page( $m[2] );
				}
			}

		}

		public function menu_order() {
			$new_menu = array();
			if(count($this->options['menu_order']) > 0){
				foreach($this->options['menu_order'] as $key => $value){
					foreach($this->menus as $menus){
						if($menus[2] == $value){
							$new_menu[] = $menus;
						}
					}
				}
				return $new_menu;
			}else{
				return $this->menus;
			}
		}

		public function custom_menu_order( $menu_ord ) {
			if (!$menu_ord) return true;
       		return isset( $this->options['menu_order'] ) ? $this->options['menu_order'] : $menu_ord;
		}

		public function admin_menu_form( $form ) {
			//var_dump($this->menus);
			//var_dump($this->options['menu_order']);
			ob_start();

			?>
			<div class="postbox dg_ap_box">
				<h3 class="hndle"><span><?php _e( 'Menu Management', 'cam' ) ?></span></h3>
				<div class="inside cam">
					<?php
					global $menu;
					$new_menu = $this->menu_order();
					?>
					<table class="form-table">
						<tr>
							<th><?php _e( 'Manage your menus', 'cam' ) ?></th>
							<td>
				                <ul class="admin_menu_list">
				                	<?php foreach( $new_menu as $menuItem ){ ?>
				                	<?php if( isset( $menuItem[0] ) && $menuItem[0] != '' ) { ?>
				                	<li>
				                		<input type="hidden" name="cam[menu_order][]" value="<?php echo $menuItem[2] ?>" />
				                		<span class="menu-name">
				                			<?php echo $menuItem[0] ?>
				                			<i class="fa fa-plus"></i>
				                		</span>
				                		<div class="menu_inner">
				                			<input type="text" name="cam[menu_rename][<?php echo $menuItem[2] ?>]" value="<?php echo isset( $this->options['menu_rename'][$menuItem[2]] ) ? $this->options['menu_rename'][$menuItem[2]] : '' ?>" placeholder="<?php echo _e( 'Rename Menu', 'cam' ) ?>" /><br><br>
				                			<input <?php echo isset( $this->options['hide_menu'][$menuItem[2]] ) && $this->options['hide_menu'][$menuItem[2]] == 'on' ? 'checked="checked"' : '' ?> type="checkbox" name="cam[hide_menu][<?php echo $menuItem[2] ?>]" /> <?php _e( 'Hide this menu', 'cam' ) ?>
				                		</div>
				                	</li>
				                	<?php } ?>
				                	<?php } ?>
				                </ul>
							</td>
						</tr>
					</table>
					<div class="clear"></div>
				</div>
			</div>
			<?php
			$output = $form . ob_get_contents();
			ob_end_clean();
			return $output;
		}

	}

	new CustomAdminMenu();

}
