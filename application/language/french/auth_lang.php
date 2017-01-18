<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Benoit LIETAER
*         @gmail.com
*
* Adjustments by ggallon
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  14.02.2014
*
* Description:  French language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'La validation de ce formulaire a échoué.';

// Login
$lang['login_heading']         = 'Se connecter';
$lang['login_subheading']      = 'Veuillez vous connecter avec votre nom d\'utilisateur et votre mot de passe.';
$lang['login_identity_label']  = 'E-mail/Nom d\'utilisateur :';
$lang['login_password_label']  = 'Mot de passe :';
$lang['login_remember_label']  = 'Rester connecté :';
$lang['login_submit_btn']      = 'Se connecter';
$lang['login_forgot_password'] = 'Mot de passe oublié ?';

// Index
$lang['index_heading']           = 'Utilisateurs';
$lang['index_subheading']        = 'Ci-dessous se trouve la liste des utilisateurs.';
$lang['index_fname_th']          = 'Prénom';
$lang['index_lname_th']          = 'Nom';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groupes';
$lang['index_status_th']         = 'Statut';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Activer';
$lang['index_inactive_link']     = 'Désactiver';
$lang['index_create_user_link']  = 'Créer un nouvel utilisateur';
$lang['index_create_group_link'] = 'Créer un nouveau groupe';

// Deactivate User
$lang['deactivate_heading']                  = 'Désactiver un utilisateur';
$lang['deactivate_subheading']               = 'Êtes-vous certain de vouloir désactiver l\'utilisateur : %s';
$lang['deactivate_confirm_y_label']          = 'Oui :';
$lang['deactivate_confirm_n_label']          = 'Non :';
$lang['deactivate_submit_btn']               = 'Envoyer';
$lang['deactivate_validation_confirm_label'] = 'Confirmation';
$lang['deactivate_validation_user_id_label'] = 'Identifiant';

// Create User
$lang['create_user_heading']                           = 'Créer un utilisateur';
$lang['create_user_subheading']                        = 'Veuillez entrer les informations ci-dessous.';
$lang['create_user_fname_label']                       = 'Prénom :';
$lang['create_user_lname_label']                       = 'Nom :';
$lang['create_user_identity_label']                    = 'Identité :';
$lang['create_user_company_label']                     = 'Société :';
$lang['create_user_email_label']                       = 'Email :';
$lang['create_user_phone_label']                       = 'Téléphone :';
$lang['create_user_password_label']                    = 'Mot de passe :';
$lang['create_user_password_confirm_label']            = 'Confirmer le mot de passe :';
$lang['create_user_submit_btn']                        = 'Créer l\'utilisateur';
$lang['create_user_validation_fname_label']            = 'Prénom';
$lang['create_user_validation_lname_label']            = 'Nom';
$lang['create_user_validation_identity_label']         = 'Identité :';
$lang['create_user_validation_email_label']            = 'Adresse Email';
$lang['create_user_validation_phone1_label']           = 'Première partie du numéro de téléphone';
$lang['create_user_validation_phone2_label']           = 'Seconde partie du numéro de téléphone';
$lang['create_user_validation_phone3_label']           = 'Troisième partie du numéro de téléphone';
$lang['create_user_validation_company_label']          = 'Société';
$lang['create_user_validation_password_label']         = 'Mot de passe';
$lang['create_user_validation_password_confirm_label'] = 'Confirmation du mot de passe';

// Edit User
$lang['edit_user_heading']                           = 'Éditer l\'utilisateur';
$lang['edit_user_subheading']                        = 'Veuillez entrer les données de l\'utilisateur ci-dessous.';
$lang['edit_user_fname_label']                       = 'Prénom :';
$lang['edit_user_lname_label']                       = 'Nom :';
$lang['edit_user_company_label']                     = 'Société :';
$lang['edit_user_email_label']                       = 'E-mail :';
$lang['edit_user_phone_label']                       = 'Téléphone :';
$lang['edit_user_password_label']                    = 'Mot de passe (si modifié) :';
$lang['edit_user_password_confirm_label']            = 'Confirmer le mot de passe :';
$lang['edit_user_groups_heading']                    = 'Membre du groupe';
$lang['edit_user_submit_btn']                        = 'Enregistrer les mofifications';
$lang['edit_user_validation_fname_label']            = 'Prénom';
$lang['edit_user_validation_lname_label']            = 'Nom';
$lang['edit_user_validation_email_label']            = 'Adresse email';
$lang['edit_user_validation_phone1_label']           = 'Première partie du numéro de téléphone';
$lang['edit_user_validation_phone2_label']           = 'Seconde partie du numéro de téléphone';
$lang['edit_user_validation_phone3_label']           = 'Troisième partie du numéro de téléphone';
$lang['edit_user_validation_company_label']          = 'Société';
$lang['edit_user_validation_groups_label']           = 'Groupes';
$lang['edit_user_validation_password_label']         = 'Mot de passe';
$lang['edit_user_validation_password_confirm_label'] = 'Confirmation du Mot de passe';

// Create Group
$lang['create_group_title']                  = 'Créer le Groupe';
$lang['create_group_heading']                = 'Créer le Groupe';
$lang['create_group_subheading']             = 'Veuillez entrer les informations du groupe ci-dessous.';
$lang['create_group_name_label']             = 'Nom du groupe :';
$lang['create_group_desc_label']             = 'Description :';
$lang['create_group_submit_btn']             = 'Créer le Groupe';
$lang['create_group_validation_name_label']  = 'Nom du Groupe';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Éditer le Groupe';
$lang['edit_group_saved']                  = 'Groupe enregistré';
$lang['edit_group_heading']                = 'Éditer le  Groupe';
$lang['edit_group_subheading']             = 'Veuillez entrer les informations du groupe ci-dessous.';
$lang['edit_group_name_label']             = 'Nom du Groupe :';
$lang['edit_group_desc_label']             = 'Description :';
$lang['edit_group_submit_btn']             = 'Enregister les mofifications';
$lang['edit_group_validation_name_label']  = 'Nom du Groupe';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Changer le mot de passe';
$lang['change_password_old_password_label']                    = 'Ancien mot de passe :';
$lang['change_password_new_password_label']                    = 'Le nouveau mot de passe (doit contenir %s caractères minimum) :';
$lang['change_password_new_password_confirm_label']            = 'Confirmer le nouveau mot de passe :';
$lang['change_password_submit_btn']                            = 'Enregistrer';
$lang['change_password_validation_old_password_label']         = 'Ancien mot de passe';
$lang['change_password_validation_new_password_label']         = 'Nouveau mot de passe';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirmer le nouveau mot de passe';

// Forgot Password
$lang['forgot_password_heading']                 = 'Mot de passe oublié';
$lang['forgot_password_subheading']              = 'Veuillez entrer votre %s pour que nous puissions vous envoyer votre nouveau mot de passe.';
$lang['forgot_password_email_label']             = '%s :';
$lang['forgot_password_submit_btn']              = 'Envoyer';
$lang['forgot_password_validation_email_label']  = 'Adresse Email';
$lang['forgot_password_username_identity_label'] = 'Nom d\'utilisateur';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Cette adresse email n\'est pas enregistrée chez nous.';

// Reset Password
$lang['reset_password_heading']                               = 'Modifier le mot de passe';
$lang['reset_password_new_password_label']                    = 'Nouveau mot de passe (doit contenir %s caractères minimum) :';
$lang['reset_password_new_password_confirm_label']            = 'Confirmez le nouveau mot de passe :';
$lang['reset_password_submit_btn']                            = 'Enregistrer';
$lang['reset_password_validation_new_password_label']         = 'Nouveau mot de passe';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirmer le nouveau mot de passe';

// Activation Email
$lang['email_activate_heading']    = 'Activer le compte pour %s';
$lang['email_activate_subheading'] = 'Veuillez cliquer sur le lien pour %s';
$lang['email_activate_link']       = 'Activer votre compte';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Changer le mot de passe pour %s';
$lang['email_forgot_password_subheading'] = 'Veuillez cliquer sur ce lien pour %s';
$lang['email_forgot_password_link']       = 'Changer votre mot de passe';

// New Password Email
$lang['email_new_password_heading']    = 'Nouveau mot de passe pour %s';
$lang['email_new_password_subheading'] = 'Votre mot de passe a été changé pour : %s';

// Please translate
// 
// NEW for OB
$lang['group_removed']						= 'Groupe supprimé';
$lang['group_protected']					= 'Groupe protégé. Vous ne pouvez pas le supprimer.';
$lang['group_not_removed']					= 'Erreur lors de la suppression du groupe.  Veuillez réessayer.';
$lang['remove_group_heading']				= 'supprimer un groupe';

// permissions
$lang['permissions_label']					= 'Permissions';
$lang['permissions_desc']					= 'Choisissez les actions que ce groupe peut effecctuer.';
$lang['admin_perm_notice']					= 'Le groupe admin a accès à l\'intégralité du site. Les permissions d\'administrateur ne peuvent pas être changées.';
$lang['index_create_perm_link']				= 'Nouvelle Permission';
$lang['permissions_name_label']				= 'Nom';
$lang['edit_perm_heading']					= 'Editer Permission';
$lang['edit_perm_subheading']				= 'Veuillez Editer les informations de permission ci-dessous.';
$lang['remove_perm_heading']				= 'Supprimer Permission';
$lang['edit_perm_saved']					= 'Sauvegarder Permission';



$lang['users_perms_slug']					= 'Utilisateurs';
$lang['users_perms_desc']					= 'Ce groupe peut-il administrer les utilisateurs?';
$lang['posts_perms_slug']					= 'Posts';
$lang['posts_perms_desc']					= 'Ce groupe peut-il administrer les posts?';
$lang['pages_perms_slug']					= 'Pages';
$lang['pages_perms_desc']					= 'Ce groupe peut-il administrer les pages?';
$lang['links_perms_slug']					= 'Liens';
$lang['links_perms_desc']					= 'Ce groupe peut-il administrer les liens?';
$lang['social_perms_slug']					= 'Social';
$lang['social_perms_desc']					= 'Ce groupe peut-il administrer les liens sociaux?';
$lang['comments_perms_slug']					= 'Commentaires';
$lang['comments_perms_desc']					= 'Ce groupe peut-il administrer les commentaires?';
$lang['navigation_perms_slug']					= 'Navigation';
$lang['navigation_perms_desc']					= 'Ce groupe peut-il administrer la navigation?';
$lang['themes_perms_slug']					= 'Thèmes';
$lang['themes_perms_desc']					= 'Ce groupe peut-il administrer les thèmes?';
$lang['settings_perms_slug']					= 'Options';
$lang['settings_perms_desc']					= 'Ce groupe peut-il administrer les options?';
$lang['updates_perms_slug']					= 'Mise à Jour';
$lang['updates_perms_desc']					= 'Ce groupe peut-il administrer les Mise à Jours?';


$lang['perm_already_exists']					= 'La permission existe déjà.';
