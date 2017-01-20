<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Language variable for the admin control panel
 */

$lang['yes']								= 'Oui';
$lang['no']									= 'Non';
$lang['pages']								= 'Pages';
$lang['blog']								= 'Blog';

// Settings
$lang['settings_help_txt']					= "Les options permettent de changer la manière dont votre site web effectu certaines actions ainsi que des informations basiques telles que le nom du site.";
$lang['allow_comments_label']				= "Autoriser les commentaires";
$lang['allow_comments_desc']				= "Voulez vous autoriser les commentaires sur le post de votre blog?";
$lang['base_controller_label']				= "Controlleur de base";
$lang['base_controller_desc']				= "Choisissez où se trouve la page d'acceuil...";
$lang['blog_description_label']				= "Description du blog";
$lang['blog_description_desc']				= "Entrez une simple description (ou des tags) pour votre blog.";
$lang['category_list_limit_label']			= "Limite de la catégorie";
$lang['category_list_limit_desc']			= "Choisissez combien d'elements vous souhaitez afficher lorsque les catégories sont affichées sur la page d'acceuil.";
$lang['enable_atom_comments_label']			= "Activer les commentaires ATOM";
$lang['enable_atom_comments_desc']			= "Voulez vous activer le flux de commentaires ATOM sur votre blog?";
$lang['enable_atom_posts_label']			= "Activer les posts ATOM";
$lang['enable_atom_posts_desc']				= "Voulez vous activer le flux de posts ATOM sur votre blog?";
$lang['enable_rss_comments_label']			= "Activer les commentaires RSS";
$lang['enable_rss_comments_desc']			= "Voulez vous activer le flux de commentaires RSS sur votre blog?";
$lang['enable_rss_posts_label']				= "Activer les posts RSS";
$lang['enable_rss_posts_desc']				= "Voulez vous activer le flux de posts RSS sur votre blog?";
$lang['links_per_box_label']				= "Limite des liens";
$lang['links_per_box_desc']					= "Choisissez combien d'elements vous souhaitez afficher lorsque les liens sont affichés sur la page d'acceuil.";
$lang['mod_non_user_comments_label']		= "Modérer les commentaires d'utilisateurs non enregistrés.";
$lang['mod_non_user_comments_desc']			= "Voulez vous modérer les utilisateurs non enregistrés ou non connectés?";
$lang['mod_user_comments_label']			= "Modérer les commentaires utilisateurs";
$lang['mod_user_comments_desc']				= "Voulez vous modérer les utilisateurs enregistrés?";
$lang['months_per_archive_label']			= "Limite des Archives";
$lang['months_per_archive_desc']			= "Choisissez combien d'elements vous souhaitez afficher lorsque les archives sont affichées sur la page d'acceuil.";
$lang['posts_per_page_label']				= "Limite de posts par page";
$lang['posts_per_page_desc']				= "Combien de posts souhaitez vous afficher par page de votre blog?";
$lang['recaptcha_private_key_label']		= "Clef Google Recaptcha Privée";
$lang['recaptcha_private_key_desc']			= "Entrez la clef PRIVÉE PRIVATE fournie par google.";
$lang['recaptcha_site_key_label']			= "Clef PRIVÉE PRIVATE fournie par google.";
$lang['recaptcha_site_key_desc']			= "Entrez la clef PRIVÉE PRIVATE fournie par google.";
$lang['site_name_label']					= "Nom du Site";
$lang['site_name_desc']						= "Entrez le nom du site";
$lang['theme_image_label']					= "";
$lang['theme_image_desc']					= "";
$lang['use_recaptcha_label']				= "Activer le Recaptcha";
$lang['use_recaptcha_desc']					= 'Souhaitez vous activer les Captcha Google pour aider à éliminer les SPAM et à la modération des commentaires? <a href="https://www.google.com/recaptcha/intro/" target="_blank">More Info <sup><i class="fa fa-external-link"></i></sup></a>';
$lang['use_honeypot_label']					= "Activer les Honey Pots pour les formulaires";
$lang['use_honeypot_desc']					= "Pour vous aider à éviter les spams, vous pouvez utiliser un Honey Pot: le spammer va remplir des formulaires invisibles qui ne doivent pas l'être. Cela va protéger vos commentaires et les formulaires d'enregistrements contre les robots, mais pas les humains. ";
$lang['mail_protocol_label']				= "Protocol de Mail";
$lang['mail_protocol_desc']					= "Choisissez le protocol de mail avec lequel vous souhaitez envoyer des mails.";
$lang['smtp']								= 'SMTP (Nécessite un compte mail smtp Ex: votre server, google, yahoo, etc)';
$lang['mail']								= 'MAIL (Facile à utiliser, Mauvais pour les gros envois)';
$lang['sendmail']							= "SENDMAIL (Certains serveurs n'acceptent pas le protocole 'mail'.)";
$lang['sendmail_path_label']				= "Chemin vers Sendmail";
$lang['sendmail_path_desc']					= "(Nécessaire si vous utilisez SENDMAIL) Entrez le chemin vers SENDMAIL. Généralement disponible dans le panneau de controle de votre serveur.";
$lang['smtp_user_label']					= "Utilisateur SMTP";
$lang['smtp_user_desc']						= "(Nécessaire si vous utilisez SMTP) Entrez le nom d'utilisateur de votre compte SMTP.";
$lang['smtp_host_label']					= "Hôte SMTP";
$lang['smtp_host_desc']						= "(Nécessaire si vous utilisez SMTP) Entrez l'hôte de votre compte SMTP.  (EX: google.com, mail.yourdomain.com, etc)";
$lang['smtp_pass_label']					= "SMTP Password";
$lang['smtp_pass_desc']						= "(Nécessaire si vous utilisez SMTP) Entrez le mot de passe de votre compte SMTP.";
$lang['smtp_port_label']					= "SMTP Port";
$lang['smtp_port_desc']						= "(Nécessaire si vous utilisez SMTP) Entrez le port renseigné par l'hôte de votre serveur SMTP.";
$lang['admin_email_label']					= "EMail Admin";
$lang['admin_email_desc']					= "L'adresse mail sur laquelle vous souhaitez recevoir des notifications à propos du site.";
$lang['server_email_label']					= "Email Serveur";
$lang['server_email_desc']					= "L'adresse mail avec laquelle vous souhaitez que le serveur envoit les mails. Cela peut êtres 'noreply@' ('nepasrepondre@'') ou votre email afin que les utilisateur puissent répondre à un humain.";


$lang['email_activation_label']					= "Activation par mail";
$lang['email_activation_desc']					= "Souhaitez vous que les utilisateurs vérifient le compte par mail avant de pouvoir se connecter et commenter? (Option recommendée)";
$lang['manual_activation_label']				= "Activation Manuelle";
$lang['manual_activation_desc']					= "Souhaitez vous vérifier chaque utilisateur qui s'inscrit?";
$lang['allow_registrations_label']				= "Autoriser l'inscription";
$lang['allow_registrations_desc']				= "Souhaitez vous autoriser la création du compte pour votre blog?";







// Links
$lang['links_hdr']							= "Liens";
$lang['link_remove_btn']					= "Suprrimer le lien";
$lang['link_edit_btn']						= "Éditer un lien";
$lang['index_add_new_link']					= "Ajouter un nouveau lien";
$lang['add_link_subheading']				= "Ajoutez les informations du lien. Ce sont des liens externes, assurez vous de faire précéder votre lien par http:// ou https://.";
$lang['link_form_name']						= "Nom du lien";
$lang['link_form_url']						= "http://";
$lang['link_form_desc']						= "Description";
$lang['link_form_position']					= "Ordre";
$lang['link_form_target']					= "Cible";
$lang['link_form_visibility']				= "Visibilité";
$lang['blank_window']						= "Ouvrir dans une nouvelle fenêtre";
$lang['same_window']						= "Ouvrir dans la même fenêtre";
$lang['visible']							= "Visible";
$lang['not_visible']						= "Caché";
$lang['save_link_btn']						= "Enregistré le lien";
$lang['link_added_success_resp']			= "Lien ajouté avec succès";
$lang['link_added_fail_resp']				= "Impossible d'ajouter le lien. Essayez ultérieurement.";
$lang['link_removed_success_resp']			= "Lien supprimé avec succès.";
$lang['link_removed_fail_resp']				= "Impossible de supprimer le lien. Essayez ultérieurement.";
$lang['link_update_success_resp']			= "Lien mis à jour avec succès";
$lang['link_update_fail_resp']				= "Impossible de mettre à jour le lien. Essayez ultérieurement.";



// Categories
$lang['cats_hdr']							= "Catégories";
$lang['cat_remove_btn']						= "Supprimer la Catégorie";
$lang['cat_edit_btn']						= "Modifier la Catégorie";
$lang['index_add_new_cat']					= "Ajouter une nouvelle Catégorie";
$lang['add_cat_subheading']					= "Ajoutez les informations de la catégorie.";
$lang['cat_form_name']						= "Nom de la catégorie";
$lang['cat_form_url']						= "(comme au dessus, en minuscules uniquement, sans espaces)";
$lang['cat_form_desc']						= "Description";
$lang['blank_window']						= "Ouvrir dans une nouvelle fenêtre";
$lang['same_window']						= "Ouvrir dans la même fenêtre";
$lang['visible']							= "Visible";
$lang['not_visible']						= "Caché";
$lang['save_cat_btn']						= "Enregistrer la catégorie";
$lang['cat_added_success_resp']				= "Catégorie ajoutée avec succès";
$lang['cat_added_fail_resp']				= "Impossible d'ajouter la catégorie. Essayez ultérieurement.";
$lang['cat_removed_success_resp']			= "Catgorie supprimée avec succès";
$lang['cat_removed_fail_resp']				= "Impossible de supprimer la catégorie. Essayez ultérieurement.";
$lang['cat_update_success_resp']			= "Catégorie mise à jour avec succès";
$lang['cat_update_fail_resp']				= "Impossible de mettre à jour la catégorie. Essayez ultérieurement.";


// pages
$lang['pages_hdr']							= "Pages";
$lang['optional_hdr']						= "Optionel";
$lang['optional_help_text']					= "Bien que les options ci-dessous soient optionelles, elles sont vivement recommendées et aident beaucoup avec la Search Engine Optimization (SEO, optimisation du moteur de recherche).  Nous générons aussi des meta tags pour facebook et twitter avec ces valeurs";  
$lang['page_remove_btn']					= "Supprimer la Page";
$lang['page_edit_btn']						= "Editer la Page";
$lang['index_add_new_page']					= "Ajouter une nouvelle Page";
$lang['index_edit_page']					= "Editer la Page";
$lang['save_page_btn']						= "Sauvegarder la Page";
$lang['page_added_success_resp']			= "Page ajoutée avec succès";
$lang['page_added_fail_resp']				= "Erreur lors de l'ajout de la page.  Veuillez réessayer.";
$lang['page_removed_success_resp']			= "Page supprimée avec succès";
$lang['page_removed_fail_resp']				= "Erreur lors de la suppression de la page.  Veuillez réessayer.";
$lang['page_update_success_resp']			= "Page mise à jour avec succès";
$lang['page_update_fail_resp']				= "Erreur lors de la mise à jour de la page.  Veuillez réessayer.";
$lang['page_form_title_text']				= "Page Titre";
$lang['page_form_title_help_text']			= "Entrer le titre de votre page.";
$lang['page_form_status_text']				= "Statut";
$lang['page_form_status_help_text']			= "Choisissez si vous voulez que la page soit en ligne ou en brouillon.";
$lang['page_form_status_active']			= "En ligne";
$lang['page_form_status_inactive']			= "Brouillon";
$lang['page_form_content_text']				= "Contenu de la page";
$lang['page_form_content_help_text']		= "Entrez le contenu de votre page ci-dessous. Utilisez l'éditeur pour aider dans votre formatage.";
$lang['page_form_meta_title_text']			= "META Titre";
$lang['page_form_meta_title_help_text']		= "Usuellement la même que votre page titre, mais vous pouvez en entrer une différente ici.";
$lang['page_form_meta_keywords_text']		= "META Mots clef";
$lang['page_form_meta_keywords_help_text']	= "Entrez les mots clef pour cette page separatés par des virgules.";
$lang['page_form_meta_desc_text']			= "META Description";
$lang['page_form_meta_desc_help_text']		= "Entrez la description pour cette page.  Il est mieux de la garder entre 50 et 100 caractères.";
$lang['page_form_home_text']				= "Page d'accueil";
$lang['page_form_home_help_text']			= "Cochez la case si cette page est la page d'accueil. Vous devez choisir les Pages comme étant le contrôleur par défaut dans les options.  Tout autre page courramment marquée comme page d'accueil sera supprimée comme la page d'accueil.";
$lang['page_form_url_title_text']			= "URL Titre";
$lang['page_form_url_title_help_text']		= "Ceci est la description montrée dans l'URL de votre page. Si vous changez cette valeur, Il NE doit PAS y avoir d'espace entre les mots, à la place, utilisez des tirets. <br>IE: new-url-title";
$lang['page_form_redirect_text']			= "Redirection";
$lang['page_form_redirect_help_text']		= "Si vous changez le titre de l'URL ci-dessus nous mettons automatiquement en place une redirection HTTP 301 (permanent) pour vous donc l'ancienne url_title pointe sur la nouvelle page url_title. Ici, vous pouvez changer les options par default.";
$lang['page_form_redirect_none']			= "Ne pas Rediriger les anciennes URL Titre";
$lang['page_form_redirect_perm']			= "Redirige de façon permanente vers la nouvelle URL Titre";
$lang['page_form_redirect_temp']			= "Redirige de façon temporaire vers la nouvelle URL Titre";



// posts
$lang['posts_hdr']							= "Posts";
$lang['optional_hdr']						= "Optionel";
$lang['optional_help_text']					= "Bien que les options ci-dessous soit optionelles, elles sont fortement recommendées et aident grandement la Search Engine Optimization (SEO: Optimisation du moteur de recherche). Nous générons aussi des meta tags pour facebook et twitter avec ces valeurs.";
$lang['post_remove_btn']					= "Supprimer le Post";
$lang['post_edit_btn']						= "Éditer le Post";
$lang['index_add_new_post']					= "Ajouter un nouveau post";
$lang['index_edit_post']					= "Éditer le Post";
$lang['save_post_btn']						= "Enregistrer le post";
$lang['post_added_success_resp']			= "Post ajouté avec succès";
$lang['post_added_fail_resp']				= "Impossible d'ajouter le post. Essayez ultérieurement.";
$lang['post_removed_success_resp']			= "Post supprimé avec succès";
$lang['post_removed_fail_resp']				= "Impossible de supprimer le post.  Essayez ultérieurement.";
$lang['post_update_success_resp']			= "Post mis à jour avec succès";
$lang['post_update_fail_resp']				= "Impossible de mettre à jour le post.  Essayez ultérieurement.";
$lang['post_form_title_text']				= "Titre du post";
$lang['post_form_title_help_text']			= "Entrez le titre de votre post.";
$lang['post_form_status_text']				= "Statut";
$lang['post_form_status_help_text']			= "Choisissez si vous voulez que le post soit en ligne ou en brouillon.";
$lang['post_form_status_active']			= "En Ligne";
$lang['post_form_status_inactive']			= "Brouillon";
$lang['post_form_content_text']				= "Contenu du post";
$lang['post_form_content_help_text']		= "Entrez le contenu de votre post. Utilisez l'éditeur pour vous aider dans votre formatage.";
$lang['post_form_excerpt_text']				= "Résumé du Post";
$lang['post_form_excerpt_help_text']		= "Entrez un court text ~200 caractères (teaser) résumant votre post.";
$lang['post_form_cats_help_text']			= "Choisissez une catégorie.  Pour en choisir plusieurs, pressez CMD/CTRL + Cliquez sur vos choix.";
$lang['post_form_meta_title_text']			= "META Titre";
$lang['post_form_meta_title_help_text']		= "Généralement similaire à votre titre, mais vous pouvez metre autre chose.";
$lang['post_form_meta_keywords_text']		= "META Mots clefs";
$lang['post_form_meta_keywords_help_text']	= "Entrez les mots clefs de ce post, séparés par des virgules";
$lang['post_form_meta_desc_text']			= "META Description";
$lang['post_form_meta_desc_help_text']		= "Entrez la description. Il vaut mieux la restreindre à 50~100 caractères.";
$lang['post_form_home_text']				= "Page d'acceuil";
$lang['post_form_home_help_text']			= "Cochez cette case si ce post est sur la page d'acceuil. Vous devez choissir les posts comme étant le controlleur par défaut dans les options. Tou autre post marqué comme page d'acceuil sera supprimé de la page d'acceuil.";
$lang['post_form_url_title_text']			= "Titre de L'URL";
$lang['post_form_url_title_help_text']		= "Ceci est la description affichée dans l'URL de votre post. Si vous changez cette valeur, Il doit y avoir AUCUN espace entre les mots, utilisez des tirets à la place. <br>EX: nouveau-titre-url";
$lang['post_add_form_url_title_help_text']	= "Ceci est la description affichée dans l'URL de votre post. Si vous changez cette valeur, Il doit y avoir AUCUN espace entre les mots, utilisez des tirets à la place. Vous pouvez laisser ça blanc et nous allons en construir un en se basant sur le titre d evotre post. <br>EX: nouveau-titre-url";

$lang['post_form_redirect_text']			= "Redirection";
$lang['post_form_redirect_help_text']		= "Si vous changez le titre de l'URL, nous mettons automatiquement une redirection HTTP 301 (permanent) automatiquement pour vous afin que l'ancienne url pointe vers la nouvelle. Ici, vous pouvez modifier les options par defaut.";
$lang['post_form_redirect_none']			= "Ne pas rediriger l'ancien URL";
$lang['post_form_redirect_perm']			= "Rediriger de manière permanente l'URL";
$lang['post_form_redirect_temp']			= "Rediriger temporairement l'URL";
$lang['post_form_feature_image_text']		= "Illustration";
$lang['post_add_form_feature_image_help_text']		= "Upload une illustration, ou laisser vide.";
$lang['post_edit_form_feature_image_help_text']		= "Upload une illustration pour remplacer l'actuelle, ou laisser vide pour la garder.";
$lang['post_new_post_notification_sbj']		= "Nouveau Post";
$lang['post_new_post_notification_msg']		= "Salut!   Nous veunons just d'ajouter du nouveau contenu. Ci-dessous, le nouveau post. <br><br>";
$lang['post_new_post_notification_msg_foot']		= "<br><br>Vous recevez ce mail car vous avez demander du nouveau contenu lorsque nous l'ajoutons. ";


// navigation
$lang['nav_hdr']							= "Navigation";
$lang['nav_new_hdr']						= "Crée un élément de navigation";
$lang['nav_right_side_hdr']					= "Lien de navigation";
$lang['nav_right_side_desc']				= "Ci-dessous, redirigez vous vers un 
spécifique. Leave all options blank to point to your homepage.";
$lang['index_add_new_nav']					= "Ajouter un élément de navigation ";
$lang['tab_all_nav_items']					= "Tous les éléments de navigation";
$lang['tab_nav_redirects']					= "Redirection";
$lang['nav_hdr']							= "Navigation";
$lang['index_nav_desc']						= "Glisser-déposer l'élément pour réordonner la première page de votre site.";
$lang['index_redirect_desc']				= "Le tableau ci-dessous montre toutes les redirections possibles des pages et des posts de votre site. Ceci inclut aussi le type de redirection et le type associé (page ou post). <b>Editer ou enlever des redirections devrait être fait par des utilisateurs confirmés</b>.";
$lang['nav_no_redirects_found']				= "Aucune redirection trouvée";
$lang['redir_edit_btn']						= "Editer redirection";
$lang['redir_remove_btn']					= "Enlever redirection";
$lang['nav_edit_btn']						= "Editer";
$lang['nav_remove_btn']						= "Enlever";
$lang['nav_edit_hdr']						= "Editer l'élément de navigation";
$lang['nav_save_btn']						= "Sauver l'élément de navigation";
$lang['nav_form_title_text']				= "Titre";
$lang['nav_form_title_help_text']			= "Texte affiché sur la barre de navigation, vu en premier par les utilisateurs.";
$lang['nav_form_desc_text']					= "Description";
$lang['nav_form_desc_help_text']			= "Description de ce lien, utilisé comme champ de titre. Les visiteurs le voient quand ils déplacent leur souris au dessus du lien.";
$lang['nav_form_url_text']					= "URI, identifiant uniforme de ressource";
$lang['nav_form_url_help_text']				= "Partie URI de votre lien. Lorsque vous générerez un lien, l'URL de votre site sera automatiquement ajoutée.";
$lang['nav_form_url_text_example']			= "À propos";
$lang['nav_form_redirect_text']				= "Redirection";
$lang['nav_form_redirect_help_text']		= "Si vous avez changé le champ 'choisir une page' ou 'choisir un post', nous installons directement une redirection HTTP 301 (permanente) afin que l'ancienne URI pointe vers la nouvelle. Vous pouvez ici changer les paramètres par défaut.";
$lang['nav_form_redirect_text']				= "Redirection";
$lang['nav_form_type_text']					= "Type";
$lang['nav_form_type_help_text']			= "Si vous avez changé le champ 'choisir une page' ou 'choisir un post', veuillez indiquer si cet élement référence un post ou unue page. Nous en avons besoin pour bien définir la redirection.";
$lang['nav_form_type_page']					= "C'est une page";
$lang['nav_form_type_post']					= "C'est un post de blog";
$lang['nav_update_success_resp']			= "Mise à jour de l'élément de navigation réussie";
$lang['nav_update_fail_resp']				= "Mise à jour de l'élément de navigation impossible. Veuillez recommencer.";
$lang['nav_form_choose_page']				= "Choisir une page";
$lang['nav_form_choose_page_help_text']		= "Choisir parmi les pages existantes.";
$lang['nav_form_choose_post']				= "Choisir un post de blog";
$lang['nav_form_choose_post_help_text']		= "Choisir parmi les post existants.";
$lang['pages_index_controller_label']		= "Page marquée comme page d'accueil";
// redirection
$lang['nav_redir_edit_hdr']					= "Edition de redirection";
$lang['nav_redir_edit_subheading']			= "<b><em>Important</em></b>:  Seulement les utilisateurs confirmés devraient changer ou éditer des éléments de navigation.  Ceci pourrait avoir un impact négatif sur le SEO, et produire des erreurs 404 chez certains utilisateurs. À utiliser avec précaution.";
$lang['nav_redirect_removed_success_resp']	= "Redirection supprimée avec succès ";
$lang['nav_redirect_removed_fail_resp']		= "Suprression de la redirection impossible. Veuillez réessayer.";
$lang['nav_redirect_edit_success_resp']		= "Redirection mise à jour avec succès";
$lang['nav_redirect_edit_fail_resp']		= "Mise à jour de la redirection impossible. Veuillez réessayer.";
$lang['nav_redir_form_old_slug_text']		= "De";
$lang['nav_redir_form_old_slug_desc']		= "Le champ 'De' est l'ancien segment URI, celui qui sera initialement appelé.";
$lang['nav_redir_form_new_slug_text']		= "À";
$lang['nav_redir_form_new_slug_desc']		= "Le champ 'À' est le nouveau segment URI, celui vers lequel l'utilisateur sera redirigé.";
$lang['nav_redir_form_type_text']			= "Type";
$lang['nav_redir_form_type_desc']			= "Si c'est une page ou un post";
$lang['nav_redir_form_code_text']			= "Redirection HTTP ";
$lang['nav_redir_form_code_desc']			= "Cette redirection devrait être temporaire (302) ou permanent (301) ?";
// Comments
$lang['comments_hdr']						= "Gérer les commentaires";
$lang['comments_no_comments_found_mod']		= "Pas de commentaires trouvés pour la modération";
$lang['comments_no_comments_found_act']		= "Pas de commentaires publiés";
$lang['comments_tab_moderated']				= "Modéré";
$lang['comments_tab_active']				= "Publié";
$lang['comments_btn_edit']					= "Edité";
$lang['comments_btn_remove']				= "Supprimé";
$lang['comments_btn_view']					= "Détails";
$lang['comments_btn_accept']				= "Accepter";
$lang['comments_btn_hide']					= "Cacher";
$lang['comments_tbl_hdr_post_title']		= "Titre du post";
$lang['comments_tbl_hdr_author']			= "Auteur";
$lang['comments_tbl_hdr_date']				= "Date";
$lang['comments_tbl_hdr_short_excerpt']		= "Court extrait";
$lang['comments_reg_user']					= "Utilisateur enregistré";
$lang['comment_removed_success_resp']		= "Commentaire supprimé avec succès";
$lang['comment_removed_fail_resp']			= "Suppression du commentaire impossible. Veuillez recommencer.";
$lang['comment_accept_success_resp']		= "Commentaire validé avec succès";
$lang['comment_accept_fail_resp']			= "Validation du commentaire impossible. Veuillez recommencer.";
$lang['comment_hide_success_resp']			= "Commentaire caché avec succès";
$lang['comment_hide_fail_resp']				= "Impossible de cacher le commentaire. Veuillez recommencer.";
$lang['comment_update_success_resp']		= "Commentaire mis à jour avec succés";
$lang['comment_update_fail_resp']			= "Mise à jour du commentaire impossible. Veuillez recommencer.";
$lang['comment_form_field_content']			= "Contenu";
$lang['comment_form_field_content_hlp_txt']	= "Vous pouvez éditer le contenu de l'utilisateur ci-dessous.";
$lang['comment_edit_hdr']					= "Editer le commentaire";
$lang['comment_edit_subheading']			= "";
$lang['comment_details_hdr']				= "Détails";
$lang['comments_save_btn']					= "Sauver le commentaire";
$lang['comments_blog_post_hdr']				= "Post de blog";
$lang['comments_comment_id']				= "ID du commentaire";
$lang['comments_author']					= "Auteur";
$lang['comments_date_posted']				= "Date reçue";
$lang['comments_current_status']			= "Statut actuel";
// updates
$lang['updates_hdr']						= "Mises à jour";
$lang['updates_subheader']					= "Vous pouvez mettre à jour les structures OpenBlog et CodeIgniter avec lesquelles il est construit. Ci-dessous, le statut actuel de l'installation.";
$lang['updates_failed_connection']			= "Impossible de se connecter à open-blog.org API.";
$lang['updates_update_available']			= "Mise à jour possible ! <br><b><em>ATTENTION : faire un backup complet du site avant la mise à jour !</em></b>";
$lang['updates_update_not_available']		= "La version de l'OpenBlog est à jour.";
$lang['updates_ob_install_text']			= "Votre installation d'OpenBlog";
$lang['updates_ob_current_stable_text']		= "Version stable actuelle communiquée";
$lang['updates_install_up_to_date_text']	= "Version OpenBlog à jour. Vous n'avez rien à faire !";
$lang['updates_update_now_btn']				= "Mettre à jour maintenant";
$lang['updates_update_success_resp']		= "Mise à jour réussie. Assurez vous de vérifier vos paramètres.";
$lang['updates_update_failed_resp']			= "Mise à jour OpenBlog impossible. Veuillez réessayer, ou trouvez de l'aide sur le site d'OpenBlog.";
$lang['updates_download_btn']				= "Télécharger la mise à jour";
// themes
$lang['themes_hdr']							= "Thèmes";
$lang['themes_subheader']					= 'Ci-dessous la liste des thèmes installés. Pour trouver d"autres thèmes ou des instructions d"installation, veuillez vous rendre sur <a href="http://open-blog.org" target="_blank">Open Blog website</a>.';
$lang['themes_theme_in_use']				= "Thème actif";
$lang['themes_theme_not_in_use']			= "thème inactif";
$lang['theme_author_title']					= "Auteur";
$lang['theme_author_email']					= "Support Email";
$lang['theme_version']						= "Version";
$lang['themes_activate_theme']				= "Activer le thème";
$lang['themes_theme_type_desc']				= "Type de thème";
$lang['themes_type_admin']					= "Administrateur";
$lang['themes_type_front']					= "Utilisateur";
$lang['themes_activated_success_resp']		= "Thème activé avec succès";
$lang['themes_activated_fail_resp']			= "Impossible d'activer le thème. Veuillez réessayer.";
// social
$lang['social_hdr']							= "Réseau social";
$lang['social_hdr_help_txt']				= "Ajouter, éditer ou supprimer les liens vers vos réseaux sociaux.";
$lang['social_add_new']						= "Ajouter";
$lang['social_edit_btn']					= "Editer";
$lang['social_remove_btn']					= "Supprimer";
$lang['social_removed_success_resp']		= "Réseau social supprimé";
$lang['social_removed_fail_resp']			= "Impossible de supprimer le réseau social. Veuillez réessayer.";
$lang['index_add_new_social']				= "Ajouter un réseau social";
$lang['social_form_name']					= "Nom";
$lang['social_form_url']					= "URL";
$lang['social_form_active']					= "Activer";
$lang['add_social_subheading']				= "Ajouter un réseau social. Entrez seulement le nom du réseau, l'URL entier (incluant http://) et si vous voulez qu'il soit actif. Les liens actifs seront montrés sur la première page du blog.";
$lang['save_social_btn']					= "Sauver le réseau social";
$lang['social_update_success_resp']			= "Réseau social mis à jour";
$lang['social_update_fail_resp']			= "Impossible de mettre à jour le réseau. Veuillez réessayer.";
$lang['social_added_success_resp']			= "Réseau social ajouté avec succès";
$lang['social_added_fail_resp']				= "Impossible d'ajouter le réseau social. Veuillez réessayer.";


// languages
$lang['languages_hdr']						= "Langues";
$lang['languages_hdr_help_txt']				= "Activer, désactiver, définir le langage par défaut. Les langues activés seront disponibles sur le site public.";
$lang['languages_disable_btn']				= "Désactiver";
$lang['languages_enable_btn']				= "activer";
$lang['languages_make_default_btn']			= "Définir par défaut";
$lang['languages_disable_success_resp']		= "Langue désactivée";
$lang['languages_disable_fail_resp']		= "Cette langue ne peut pas être désactivée. Veuillez réessayer.";
$lang['languages_enable_success_resp']		= "Langue activée";
$lang['languages_enable_fail_resp']			= "Cette langue ne peut pas être activée. Veuillez réessayer.";
$lang['languages_default_success_resp']		= "Langue par défaut changée";
$lang['languages_default_fail_resp']		= "La langue par défaut ne peut pas être changée. Veuillez réessayer.";
$lang['languages_help_text']				= 'Notes : La mention "Par défaut" est définie automatiquement quand une personne visite votre site. Elle pourra changer la langue par toute autre langue activée. Cela ne changera <b>pas</b> le texte que ous écrivez dans votre blog.';
$lang['languages_table_lang_h']				= "Langue";
$lang['languages_table_abbr_h']				= "Abbreviation";
$lang['languages_table_is_default_h']		= "Par défaut";
$lang['languages_table_enabled_h']			= "Activé";


$lang['save_settings']						= "Enregistrer les options";

//

// form action responses
$lang['settings_update_success']			= "Mise à jour des options avec succès";
$lang['settings_update_failed']				= "Échec de la mise à our des options. Esseyez ultérieurement.";


// permissions
$lang['permission_check_failed']			= "Vous devez être connecté et avoir les permissions de voir cette page.";

// installer directory warning
$lang['installer_dir_warning_notice']		= "Le dossier /installer/ est toujours présent.  Pour plus de sécurité le dossier installer/ et son contenu doivent être supprimés immédiatement!";
