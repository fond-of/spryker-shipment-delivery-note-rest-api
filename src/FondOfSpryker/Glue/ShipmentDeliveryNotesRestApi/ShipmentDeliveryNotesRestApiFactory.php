<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi;

use FondOfSpryker\Glue\InvoicesRestApi\Processor\Invoice\InvoiceReader;
use FondOfSpryker\Glue\InvoicesRestApi\Dependency\Client\InvoicesRestApiToInvoiceClientInterface;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Invoice\InvoiceReaderInterface;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Invoice\InvoiceWriter;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Invoice\InvoiceWriterInterface;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Mapper\InvoiceResourceMapper;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Mapper\InvoiceResourceMapperInterface;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiValidator;
use FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiValidatorInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class ShipmentDeliveryNotesRestApiFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Glue\OrdersRestApi\Processor\Order\OrderReaderInterface
     */
    public function createInvoiceReader(): InvoiceReaderInterface
    {
        return new InvoiceReader(
            $this->getInvoiceClient(),
            $this->createInvoiceResourceMapper(),
            $this->getResourceBuilder(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }

    /**
     * @return \Spryker\Glue\CustomersRestApi\Processor\Customer\CustomerWriterInterface
     */
    public function createInvoiceWriter(): InvoiceWriterInterface
    {
        return new InvoiceWriter(
            $this->getInvoiceClient(),
            $this->createInvoiceReader(),
            $this->getResourceBuilder(),
            $this->createInvoiceResourceMapper(),
            $this->createRestApiError(),
            $this->createRestApiValidator(),
            $this->getInvoicePostCreatePlugins()
        );
    }
    /**
     * @return \FondOfSpryker\Glue\InvoiceRestApi\Dependency\Client\InvoicesRestApiToInvoiceClientInterface
     */
    public function getInvoiceClient(): InvoicesRestApiToInvoiceClientInterface
    {
        return $this->getProvidedDependency(InvoicesRestApiDependencyProvider::CLIENT_INVOICE);
    }

    /**
     * @return \FondOfSpyker\Glue\InvoicesRestApi\Processor\Mapper\InvoicesResourceMapperInterface
     */
    public function createInvoiceResourceMapper(): InvoiceResourceMapperInterface
    {
        return new InvoiceResourceMapper();
    }

    /**
     * @return \FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiValidatorInterface
     */
    public function createRestApiValidator(): RestApiValidatorInterface
    {
        return new RestApiValidator($this->createRestApiError());
    }

    /**
     * @return \FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiErrorInterface
     */
    public function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }

    /**
     * @return \FondOfSpryker\Glue\InvoicesRestApiExtension\Dependency\Plugin\Invoice PostRegisterPluginInterface[]
     */
    public function getInvoicePostCreatePlugins(): array
    {
        return $this->getProvidedDependency(InvoicesRestApiDependencyProvider::PLUGINS_INVOICE_POST_CREATE);
    }
}
