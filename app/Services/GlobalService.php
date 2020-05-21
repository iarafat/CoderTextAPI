<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\GlobalRepositoryInterface;
use App\Contracts\Services\GlobalServiceInterface;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class GlobalService implements GlobalServiceInterface
{

    /**
     * @var GlobalRepositoryInterface
     */
    protected $globalRepository;

    /**
     * GlobalService constructor.
     * @param GlobalRepositoryInterface $globalRepository
     */
    public function __construct(GlobalRepositoryInterface $globalRepository)
    {
        $this->globalRepository = $globalRepository;
    }

    /**
     * Get menus by name
     *
     * @param $name
     * @return ServiceDTO
     */
    public function getMenusByName($name): ServiceDTO
    {
        $menus = $this->globalRepository->getMenusByName($name);
        return new ServiceDTO('List of menus', 200, $menus);
    }

    /**
     * Send contact email
     *
     * @param array $inputs
     * @return ServiceDTO
     */
    public function sendContactMessage(array $inputs): ServiceDTO
    {
        $toEmail = setting('contact-form.receive_email');
        $formEmail = $inputs['email'];
        config(['mail.from.address' => $formEmail]);

        Mail::to($toEmail)
            ->send(
                new ContactForm(
                    $inputs['first_name'],
                    $inputs['last_name'],
                    $inputs['subject'],
                    $inputs['email'],
                    $inputs['message']
                )
            );

        return new ServiceDTO('Message send successfully', 200);
    }

    /**
     * Search on products and posts tables
     *
     * @param $query
     * @param $page
     * @return ServiceDTO
     */
    public function search($query, $page): ServiceDTO
    {
        $searchResults = $this->globalRepository->search($query, $page);
        return new ServiceDTO('List of search results of products and posts', 200, $searchResults);
    }
}