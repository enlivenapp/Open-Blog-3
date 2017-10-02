<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// headers
$lang['recent_posts']                       = "Publicações Recentes";
$lang['older_posts']                        = "Publicações mais Antigas";
$lang['connect_hdr']                        = "Conectar";
$lang['blog_links_hdr']                     = "Links do Blog";
$lang['links_hdr']                          = "Links";
$lang['archives_hdr']                       = "Arquivos";
$lang['categories_hdr']                     = "Categorias";
$lang['blog_notices_hdr']                   = "Inscreva-se";
$lang['blog_notices_unsub_hdr']             = "Cancelar Inscrição";
                
$lang['category_hdr']                       = "Posts in Category ";
$lang['archives_for_hdr']                   = "Archives for ";
$lang['blog_notices_help_txt']              = "Get an email when new content is added.";
$lang['blog_notices_help_unsub_txt']        = "Enter the email address to Unsubscribe.";


// General Buttons
$lang['btn_read_more']      = "Leia mais&hellip;";
$lang['btn_edit']           = "Editar";
$lang['btn_remove']         = "Excluir";
$lang['btn_unpub']          = "Não-publicado";
$lang['submit']             = "Enviar";


// Comments
$lang['comments_disabled']                  = "Os comentários estão desativados.";
$lang['comments_disabled_post']             = "Os comentários estão desativados para esta publicação.";
$lang['comments']                           = "Comentários";
$lang['comment']                            = "Comentário";
$lang['comments_title']                     = "Comentários";
$lang['comment_submit']                     = "Enviar Comentário";
$lang['no_comments']                        = "Ainda não há comentários";
$lang['btn_approve_comment']                = "Aprovar Comentário"; // Approve modded comment
$lang['btn_remove_comment']                 = "Remover Comentário"; // Deletes the comment
$lang['btn_hide_comment']                   = "Ocultar Comentário";  // Hides Comment, provides link to 'view anyway'
$lang['btn_flag_comment']                   = "SPAM";  // flag as inappropriate, unhelpful, or SPAM
$lang['comment_help_text']                  = "Nota: sem HTML";



// Misc
$lang['add_to']                         = "Adicionar para";
$lang['posted_in']                      = "Publicado em";
$lang['in']                             = "em";
$lang['by']                             = "de";

// old pagination?
$lang['older_entries']                    = "&laquo; Publicações mais antigas";
$lang['newer_entries']                    = "Novas publicações &raquo;";




// Single post
$lang['leave_reply']                    = "Deixe um Comentário";
$lang['leave_reply_description']        = "Sinta-se à vontade para compartilhar seus pensamentos sobre isto.";

$lang['responses_to']                   = "Respostas (%d) para";
$lang['on']                             = "em";
$lang['at']                             = "em";
$lang['nickname']                       = "Nome";
$lang['email']                          = "E-mail";
//$lang['website']						= "Website";  // Depreciated
$lang['confirmation_image']             = "Imagem de confirmação";
$lang['confirmation_code']              = "Código de confirmação";


// Tags
$lang['posts_tagged_with']                  = "Publicações marcadas com";

// Search
$lang['search_results_for']                 = "Buscar resultados para";
$lang['no_results']                         = "Nenhum resultado encontrado para este termo de pesquisa.";
$lang['in']                                 = "dentro";

// Errors
$lang['error']                              = "Erro";
$lang['not_found']                          = "Não encontrado";
$lang['no_posts_for_this_tag']              = "Não há publicações com esta tag.";
$lang['no_posts_for_this_date']             = "Não existem publicações nesta data.";
$lang['no_posts_found']                     = "Nenhuma pubicação encontrada";
$lang['blog_no_posts']                      = "Este blog não tem publicações.";
$lang['invalid_confirmation_code']          = "O código de confirmação que você digitou é inválido.";
$lang['error_404_heading']                  = "Ooops!";
$lang['error_404_message']                  = "Ocorreu um erro. Verifique a URL e tente novamente.";
$lang['recaptcha']                          = "reCAPTCHA";

// Success
$lang['add_comment_success']                = "Comentário adicionado com sucesso";
$lang['add_comment_success_modded']         = "Comentário adicionado com sucesso. O seu comentário aparecerá assim que um administrador aprová-lo.";


// Emails
$lang['email_new_comment_sbj']            = "Novo Comentário";
$lang['email_new_comment_msg']            = "Você tem um novo comentário. Você pode gerenciá-lo no Painel de Controle <br><br>O novo Comentário:<br><br>";


// notices
$lang['notices_enter_email_address']        = "Insira o endereço de e-mail";
$lang['notices_get_notices']                = "Receber Notificações";
$lang['notices_unsub_btn']                  = "Cancelar inscrição";
$lang['notices_no_post_data']               = "Erro. Por favor, tente novamente.";
$lang['email_address']                      = "Endereço de E-mail";
$lang['notify_new_notification']            = 'Notificações Solicitadas';
$lang['notices_email_verify_msg']           = "Você solicitou receber notificações quando publicamos novos conteúdos em nosso site. Se isso estiver correto, clique ou acesso o link abaixo para verificar o e-mail, se você não solicitou isso, pode ignorar este e-mail e não enviaremos nenhum aviso.<br><br>Link de verificação: ";
$lang['notices_verify_failed']              = 'Parece que a verificação falhou por algum motivo. Verifique seu e-mail e tente novamente.';
$lang['notices_verify_success']             = "Obrigado por verificar seu endereço de e-mail. Nós lhe enviaremos um e-mail de confirmação também!";
$lang['notify_success']                     = 'Verificação bem-sucedida';
$lang['notices_success_verifed_msg']        = 'Obrigado por verificar seu endereço de e-mail. Começaremos a enviar um aviso quando adicionarmos conteúdo ao nosso blog.';
$lang['notices_add_success']                = 'Obrigado pelo seu interesse no nosso conteúdo! Verifique seu e-mail para obter mais instruções para verificar seu endereço de e-mail.';
$lang['notices_email_exists']               = 'Parece que já adicionamos esse endereço.';
$lang['notices_email_not_exists']           = "Parece que não adicionamos esse endereço. Tente novamente?";
$lang['notify_unsub_success']               = "Inscrição cancelada. Lamentamos vê-lo ir";
$lang['notify_unsub_sbj']                   = 'Inscrição cancelada';
$lang['notices_success_unsub_msg']          = 'Este e-mail é para confirmar que deseja cancelar a inscrição de novos conteúdos. <b>Vamos sentir sua falta!</b><br><br> Este será o último e-mail que você receberá, a menos que você se inscreva novamente.';

//$lang['']	= '';

// public language
$lang['language_changed_successfully']      = 'Idioma alterado com sucesso';
$lang['language_not_available']             = 'Não temos este idioma disponível.';
