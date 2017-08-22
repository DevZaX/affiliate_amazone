<?php 

namespace App;


class NewsletterManager
{
	protected $mailchimp;
	protected $listId = '9d575a1ad2';   

	
	public function __construct(\Mailchimp $mailchimp)
	{
		$this->mailchimp = $mailchimp;
	}

	
	public function addEmailToList($email)
	{
		try {
			$this->mailchimp
				->lists
				->subscribe(
					$this->listId,
					['email' => $email]
				);
return true;

        } catch (\Mailchimp_List_AlreadySubscribed $e) {
        	echo $e->getMessage();
        } catch (\Mailchimp_Error $e) {
        	echo $e->getMessage();
        }
	}

}