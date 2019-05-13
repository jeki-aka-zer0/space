<?php

declare(strict_types=1);

namespace Api\Model\Support\UseCase\Contact;

use Slim\Http\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=255)
     */
    public $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\Length(min=10, max=30)
     */
    public $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10, max=3000)
     */
    public $message;

    /**
     * @Assert\All({
     *     @Assert\File(
     *          maxSize = "1024k",
     *          mimeTypes = {"application/msword", "application/vnd.ms-excel", "application/vnd.ms-powerpoint", "text/plain", "application/pdf", "application/x-pdf"},
     *          mimeTypesMessage = "Please upload a valid text file."
     *      )
     * })
     * @var UploadedFile[]
     */
    public $files = [];
}
