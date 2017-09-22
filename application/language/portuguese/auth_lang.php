<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - Portuguese
*
* Author: Alfredo Braga
* 		  alphabraga@hotmail.com
*         @alphabraga
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Portuguese language file
*
*/

// Errors
$lang['error_csrf'] = 'O envio desse formulario não atendeu a requisitos de segurança.';

// Login
$lang['login_heading']         = 'Conectar';
$lang['login_subheading']      = 'Por favor entre com seu usuário/email e senha abaixo.';
$lang['login_identity_label']  = 'Usuário/E-mail:';
$lang['login_password_label']  = 'Senha:';
$lang['login_remember_label']  = 'Lembre-me:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Esqueceu sua senha?';

// Index
$lang['index_heading']           = 'Usuários';
$lang['index_subheading']        = 'Abaixo uma lista com os usuários.';
$lang['index_fname_th']          = 'Nome';
$lang['index_lname_th']          = 'Sobrenome';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Grupos';
$lang['index_status_th']         = 'Estado';
$lang['index_action_th']         = 'Ação';
$lang['index_active_link']       = 'Ativo';
$lang['index_inactive_link']     = 'Inativo';
$lang['index_create_user_link']  = 'Criar novo usuário';
$lang['index_create_group_link'] = 'Criar novo grupo';

// Deactivate User
$lang['deactivate_heading']                  = 'Desativar Usuário';
$lang['deactivate_subheading']               = 'Você tem certeza que deseja desativar esse usuário \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Sim:';
$lang['deactivate_confirm_n_label']          = 'Não:';
$lang['deactivate_submit_btn']               = 'Enviar';
$lang['deactivate_validation_confirm_label'] = 'confirmação';
$lang['deactivate_validation_user_id_label'] = 'ID do usuário';

// Create User
$lang['create_user_heading']                           = 'Criar Usuário';
$lang['create_user_subheading']                        = 'Por favor informe os dados do usuário.';
$lang['create_user_fname_label']                       = 'Nome:';
$lang['create_user_lname_label']                       = 'Sobrenome:';
$lang['create_user_identity_label']                    = 'Identidade:';
$lang['create_user_company_label']                     = 'Empresa:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Telefone:';
$lang['create_user_password_label']                    = 'Senha:';
$lang['create_user_password_confirm_label']            = 'Confirmar senha:';
$lang['create_user_submit_btn']                        = 'Criar Usuário';
$lang['create_user_validation_fname_label']            = 'Nome';
$lang['create_user_validation_lname_label']            = 'Sobrenome';
$lang['create_user_validation_identity_label']         = 'Identidade';
$lang['create_user_validation_email_label']            = 'Email';
$lang['create_user_validation_phone1_label']           = 'Primeira parte do telefone';
$lang['create_user_validation_phone2_label']           = 'Segunda parte do telefone';
$lang['create_user_validation_phone3_label']           = 'Terceira parte do telefone';
$lang['create_user_validation_company_label']          = 'Empresa';
$lang['create_user_validation_password_label']         = 'Senha';
$lang['create_user_validation_password_confirm_label'] = 'Confirmação de Senha';

// Edit User
$lang['edit_user_heading']                           = 'Editar Usuário';
$lang['edit_user_subheading']                        = 'Por favor informe os dados sobre o usuário abaixo.';
$lang['edit_user_fname_label']                       = 'Nome:';
$lang['edit_user_lname_label']                       = 'Sobrenome:';
$lang['edit_user_company_label']                     = 'Empresa:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Telefone:';
$lang['edit_user_password_label']                    = 'Senha: (se quiser mudar a senha)';
$lang['edit_user_password_confirm_label']            = 'Confirme a senha: (se quiser mudar a senha)';
$lang['edit_user_groups_heading']                    = 'Membro dos grupos';
$lang['edit_user_submit_btn']                        = 'Salvar Usuário';
$lang['edit_user_validation_fname_label']            = 'Nome';
$lang['edit_user_validation_lname_label']            = 'Sobrenome';
$lang['edit_user_validation_email_label']            = 'Email';
$lang['edit_user_validation_phone1_label']           = 'Primeira parte do fone';
$lang['edit_user_validation_phone2_label']           = 'Segunda parte do fone';
$lang['edit_user_validation_phone3_label']           = 'Terceira parte do fone';
$lang['edit_user_validation_company_label']          = 'Empresa';
$lang['edit_user_validation_groups_label']           = 'Grupos';
$lang['edit_user_validation_password_label']         = 'Senha';
$lang['edit_user_validation_password_confirm_label'] = 'Confirme a senha';

// Create Group
$lang['create_group_title']                  = 'Criar Grupo';
$lang['create_group_heading']                = 'Criar Grupo';
$lang['create_group_subheading']             = 'Por favor informe os dados sobre o grupo abaixo.';
$lang['create_group_name_label']             = 'Nome:';
$lang['create_group_desc_label']             = 'Descrição:';
$lang['create_group_submit_btn']             = 'Criar Grupo';
$lang['create_group_validation_name_label']  = 'Nome';
$lang['create_group_validation_desc_label']  = 'Descrição';

// Edit Group
$lang['edit_group_title']                  = 'Editar Grupo';
$lang['edit_group_saved']                  = 'Grupo Salvo';
$lang['edit_group_heading']                = 'Editar Group';
$lang['edit_group_subheading']             = 'Por favor informe os dados sobre o grupo abaixo.';
$lang['edit_group_name_label']             = 'Nome:';
$lang['edit_group_desc_label']             = 'Descrição:';
$lang['edit_group_submit_btn']             = 'Salvar Grupo';
$lang['edit_group_validation_name_label']  = 'Nome';
$lang['edit_group_validation_desc_label']  = 'Descrição';

// Change Password
$lang['change_password_heading']                               = 'Mudar Senha';
$lang['change_password_old_password_label']                    = 'Senha Antiga:';
$lang['change_password_new_password_label']                    = 'Nova senha: (mínimo de %s caracteres)';
$lang['change_password_new_password_confirm_label']            = 'Confirme sua Nova Senha:';
$lang['change_password_submit_btn']                            = 'Mudar';
$lang['change_password_validation_old_password_label']         = 'Senha Antiga';
$lang['change_password_validation_new_password_label']         = 'Nova Senha';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirme sua Nova Senha';

// Forgot Password
$lang['forgot_password_heading']                 = 'Esqueceu a Senha';
$lang['forgot_password_subheading']              = 'Por favor, informe seu %s para que possamos enviar para você uma mensagem para recuparar sua senha.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Enviar';
$lang['forgot_password_validation_email_label']  = 'Email';
$lang['forgot_password_username_identity_label'] = 'Login';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Este email não foi encontrado.';

// Reset Password
$lang['reset_password_heading']                               = 'Mudar Senha';
$lang['reset_password_new_password_label']                    = 'Nova senha: (mínimo de %s caracteres)';
$lang['reset_password_new_password_confirm_label']            = 'Confirme sua Nova Senha:';
$lang['reset_password_submit_btn']                            = 'Mudar';
$lang['reset_password_validation_new_password_label']         = 'Senha Antiga';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirme sua Nova Senha';

// Please translate
// 
// NEW for OB
$lang['group_removed']						= 'Grupo excluído';
$lang['group_protected']					= 'Grupo protegido. Você não pode removê-lo.';
$lang['group_not_removed']					= 'Falha ao excluir o grupo. Por favor, tente novamente.';
$lang['remove_group_heading']				= 'Excluir Grupo';

// permissions
$lang['permissions_label']					= 'Permissões';
$lang['permissions_desc']					= 'Escolha as ações que esse grupo pode executar.';
$lang['admin_perm_notice']					= 'O grupo Admin tem acesso a todas as áreas do site. As permissões de administrador não podem ser alteradas.';
$lang['index_create_perm_link']				= 'Nova Permissão';
$lang['permissions_name_label']				= 'Nome';
$lang['edit_perm_heading']					= 'Editar Permissão';
$lang['edit_perm_subheading']				= 'Edite a informação de permissão abaixo.';
$lang['remove_perm_heading']				= 'Excluir Permissão';
$lang['edit_perm_saved']					= 'Permissão Salva';



$lang['users_perms_slug']					= 'Usuários';
$lang['users_perms_desc']					= 'Esse grupo está autorizado a administrar usuários?';
$lang['posts_perms_slug']					= 'Publicações';
$lang['posts_perms_desc']					= 'Esse grupo está autorizado a administrar publicações?';
$lang['pages_perms_slug']					= 'Páginas';
$lang['pages_perms_desc']					= 'Este grupo está autorizado a administrar páginas?';
$lang['links_perms_slug']					= 'Links';
$lang['links_perms_desc']					= 'Este grupo está autorizado a administrar links?';
$lang['social_perms_slug']					= 'Redes Sociais';
$lang['social_perms_desc']					= 'Este grupo está autorizado a administrar links de redes sociais?';
$lang['comments_perms_slug']			    = 'Comentários';
$lang['comments_perms_desc']				= 'Esse grupo está autorizado a administrar comentários?';
$lang['navigation_perms_slug']				= 'Menu Principal';
$lang['navigation_perms_desc']				= 'Esse grupo está autorizado a administrar o menu principal?';
$lang['themes_perms_slug']					= 'Temas';
$lang['themes_perms_desc']					= 'Esse grupo está autorizado a administrar temas?';
$lang['settings_perms_slug']				= 'Configurações';
$lang['settings_perms_desc']				= 'Este grupo está autorizado a administrar configurações?';
$lang['updates_perms_slug']					= 'Atualizações';
$lang['updates_perms_desc']					= 'Esse grupo está autorizado a administrar atualizações?';


$lang['perm_already_exists']				= 'A permissão já existe.';
