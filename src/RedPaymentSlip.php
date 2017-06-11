<?php
/**
 * Swiss Payment Slip
 *
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @copyright 2012-2016 Some nice Swiss guys
 * @author Marc Würth ravage@bluewin.ch
 * @author Manuel Reinhard <manu@sprain.ch>
 * @author Peter Siska <pesche@gridonic.ch>
 * @link https://github.com/ravage84/SwissPaymentSlip/
 */

namespace SwissPaymentSlip\SwissPaymentSlip;

/**
 * Red Swiss Payment Slip
 *
 * Describes how a red Swiss payment slip looks like and
 * how the various data fields of a red payment slip are
 * placed or displayed respectively.
 *
 * The data of the fields is organized by its sister class RedPaymentSlipData.
 *
 * @uses RedPaymentSlipData To store the slip data.
 */
class RedPaymentSlip extends PaymentSlip
{
    /**
     * The red payment slip value object, which contains the payment slip data
     *
     * @var RedPaymentSlipData
     */
    protected $paymentSlipData = null;

    /**
     * The height of the slip
     *
     * @var int|float
     */
    protected $slipHeight = 106; // TODO default height of an red slip

    /**
     * The width of the slip
     *
     * @var int|float
     */
    protected $slipWidth = 210; // TODO default width of an red slip
    /**
     * Determines whether the IBAN should be displayed
     *
     * @var bool
     */
    protected $displayIban = true;

    /**
     * Determines whether the payment reason should be displayed
     *
     * @var bool
     */
    protected $displayPaymentReason = true;

    protected $displayCode = true;

    /**
     * Attributes of the left IBAN element
     *
     * @var array
     */
    protected $ibanLeftAttr = [];

    /**
     * Attributes of the rightIBAN element
     *
     * @var array
     */
    protected $ibanRightAttr = [];

    /**
     * Attributes of the code line element
     *
     * @var array
     */
    protected $codeLineAttr = [];

    /**
     * Attributes of the payment reason element
     *
     * @var array
     */
    protected $paymentReasonAttr = [];

    /**
     * Create a new red payment slip
     *
     * @param RedPaymentSlipData $paymentSlipData The red payment slip data.
     * @param float|null $slipPosX The optional X position of the slip.
     * @param float|null $slipPosY The optional Y position of the slip.
     */
    public function __construct(RedPaymentSlipData $paymentSlipData, $slipPosX = null, $slipPosY = null)
    {
        parent::__construct($paymentSlipData, $slipPosX, $slipPosY);
    }


    /**
     * Sets the default attributes of the elements for a red slip
     *
     * @return $this The current instance for a fluent interface.
     */
    protected function setDefaults()
    {
        parent::setDefaults();

        $this->setPayerLeftAttr(2, 65, 50, 4);
        $this->setBankLeftAttr(2, 8, 50, 4);
        $this->setIbanLeftAttr(2, 21, 0, 0, 0, 'courier');
        $this->setRecipientLeftAttr(2, 23, 50, 4);
        $this->setAmountFrancsLeftAttr(5, 51.5, 35, 4);
        $this->setAmountCentsLeftAttr(50, 51.5, 6, 4);

        $this->setPayerRightAttr(125, 48, 50, 4);
        $this->setBankRightAttr(64, 8, 50, 4);
        $this->setIbanRightAttr(64, 21, 0, 0, 0, 'courier');
        $this->setRecipientRightAttr(64, 23, 50, 4);
        $this->setAmountFrancsRightAttr(66, 51.5, 35, 4);
        $this->setAmountCentsRightAttr(111, 51.5, 6, 4);

        $this->setCodeLineAttr(64, 85, 140, 4, null, 'OCRB10');

        $this->setPaymentReasonAttr(124, 8, 50, 4);

        $this->setSlipBackground(__DIR__.'/Resources/img/ezs_red.gif');

        return $this;
    }

    /**
     * Get the slip data object of the slip
     *
     * @return RedPaymentSlipData The data object of the slip.
     */
    public function getPaymentSlipData()
    {
        return parent::getPaymentSlipData();
    }

    /**
     * Set the left IBAN attributes
     *
     * @param float|null $posX The X position.
     * @param float|null $posY The Y Position.
     * @param float|null $width The width.
     * @param float|null $height The height.
     * @param string|null $background The background.
     * @param string|null $fontFamily The font family.
     * @param float|null $fontSize The font size.
     * @param string|null $fontColor The font color.
     * @param float|null $lineHeight The line height.
     * @param string|null $textAlign The text alignment.
     * @return $this The current instance for a fluent interface.
     */
    public function setIbanLeftAttr(
        $posX = null,
        $posY = null,
        $width = null,
        $height = null,
        $background = null,
        $fontFamily = null,
        $fontSize = null,
        $fontColor = null,
        $lineHeight = null,
        $textAlign = null
    ) {
        $this->setAttributes(
            $this->ibanLeftAttr,
            $posX,
            $posY,
            $width,
            $height,
            $background,
            $fontFamily,
            $fontSize,
            $fontColor,
            $lineHeight,
            $textAlign
        );

        return $this;
    }

    /**
     * Set the right IBAN attributes
     *
     * @param float|null $posX The X position.
     * @param float|null $posY The Y Position.
     * @param float|null $width The width.
     * @param float|null $height The height.
     * @param string|null $background The background.
     * @param string|null $fontFamily The font family.
     * @param float|null $fontSize The font size.
     * @param string|null $fontColor The font color.
     * @param float|null $lineHeight The line height.
     * @param string|null $textAlign The text alignment.
     * @return $this The current instance for a fluent interface.
     */
    public function setIbanRightAttr(
        $posX = null,
        $posY = null,
        $width = null,
        $height = null,
        $background = null,
        $fontFamily = null,
        $fontSize = null,
        $fontColor = null,
        $lineHeight = null,
        $textAlign = null
    ) {
        $this->setAttributes(
            $this->ibanRightAttr,
            $posX,
            $posY,
            $width,
            $height,
            $background,
            $fontFamily,
            $fontSize,
            $fontColor,
            $lineHeight,
            $textAlign
        );

        return $this;
    }

    /**
     * Get the attributes of the left IBAN element
     *
     * @return array The attributes of the left IBAN element.
     */
    public function getIbanLeftAttr()
    {
        return $this->ibanLeftAttr;
    }

    /**
     * Get the attributes of the right IBAN element
     *
     * @return array The attributes of the right IBAN element.
     */
    public function getIbanRightAttr()
    {
        return $this->ibanRightAttr;
    }

    /**
     * Set the payment reason attributes
     *
     * @param float|null $posX The X position.
     * @param float|null $posY The Y Position.
     * @param float|null $width The width.
     * @param float|null $height The height.
     * @param string|null $background The background.
     * @param string|null $fontFamily The font family.
     * @param float|null $fontSize The font size.
     * @param string|null $fontColor The font color.
     * @param float|null $lineHeight The line height.
     * @param string|null $textAlign The text alignment.
     * @return $this The current instance for a fluent interface.
     */
    public function setPaymentReasonAttr(
        $posX = null,
        $posY = null,
        $width = null,
        $height = null,
        $background = null,
        $fontFamily = null,
        $fontSize = null,
        $fontColor = null,
        $lineHeight = null,
        $textAlign = null
    ) {
        $this->setAttributes(
            $this->paymentReasonAttr,
            $posX,
            $posY,
            $width,
            $height,
            $background,
            $fontFamily,
            $fontSize,
            $fontColor,
            $lineHeight,
            $textAlign
        );

        return $this;
    }

    /**
     * Get the attributes of the payment reason element
     *
     * @return array The attributes of the payment reason element.
     */
    public function getPaymentReasonAttr()
    {
        return $this->paymentReasonAttr;
    }

    /**
     * Set code attributes.
     *
     * @param float|null $posX The X position.
     * @param float|null $posY The Y Position.
     * @param float|null $width The width.
     * @param float|null $height The height.
     * @param string|null $background The background.
     * @param string|null $fontFamily The font family.
     * @param float|null $fontSize The font size.
     * @param string|null $fontColor The font color.
     * @param float|null $lineHeight The line height.
     * @param string|null $textAlign The text alignment.
     *
     * @return $this The current instance for a fluent interface.
     */
    public function setCodeLineAttr(
        $posX = null,
        $posY = null,
        $width = null,
        $height = null,
        $background = null,
        $fontFamily = null,
        $fontSize = null,
        $fontColor = null,
        $lineHeight = null,
        $textAlign = null
    ) {
        if ($textAlign === null) {
            $textAlign = 'R';
        }

        if ($lineHeight === null) {
            $lineHeight = 8;
        }

        $this->setAttributes(
            $this->codeLineAttr,
            $posX,
            $posY,
            $width,
            $height,
            $background,
            $fontFamily,
            $fontSize,
            $fontColor,
            $lineHeight,
            $textAlign
        );

        return $this;
    }

    /**
     * @return array
     */
    public function getCodeLineAttr()
    {
        return $this->codeLineAttr;
    }

    /**
     * Set whether or not to display the IBAN
     *
     * @param bool $displayIban True if yes, false if no
     * @return $this The current instance for a fluent interface.
     */
    public function setDisplayIban($displayIban = true)
    {
        $this->isBool($displayIban, 'displayIban');
        $this->displayIban = $displayIban;

        return $this;
    }

    /**
     * Get whether or not to display the IBAN
     *
     * @return bool True if yes, false if no.
     */
    public function getDisplayIban()
    {
        if ($this->getPaymentSlipData()->getWithIban() !== true) {
            return false;
        }
        return $this->displayIban;
    }

    /**
     * Set whether or not to display the payment reason lines
     *
     * @param bool $displayPaymentReason True if yes, false if no
     * @return $this The current instance for a fluent interface.
     */
    public function setDisplayPaymentReason($displayPaymentReason = true)
    {
        $this->isBool($displayPaymentReason, 'displayPaymentReason');
        $this->displayPaymentReason = $displayPaymentReason;

        return $this;
    }

    /**
     * Get whether or not to display the payment reason lines
     *
     * @return bool True if yes, false if no.
     */
    public function getDisplayPaymentReason()
    {
        if ($this->getPaymentSlipData()->getWithPaymentReason() !== true) {
            return false;
        }
        return $this->displayPaymentReason;
    }

    /**
     * @return bool
     */
    public function getDisplayCode()
    {
        return $this->displayCode;
    }

    /**
     * @param bool $displayCode
     */
    public function setDisplayCode($displayCode)
    {
        $this->displayCode = $displayCode;
    }

    /**
     * Get all elements of the slip
     *
     * @return array All elements with their lines and attributes.
     */
    public function getAllElements()
    {
        $paymentSlipData = $this->paymentSlipData;

        $elements = parent::getAllElements();

        // Place left IBAN
        if ($this->getDisplayIban()) {
            $lines = [
                $paymentSlipData->getFormattedIban()
            ];
            $elements['IbanLeft'] = ['lines' => $lines,
                'attributes' => $this->getIbanLeftAttr()
            ];

            // Place right IBAN
            // Reuse lines from above
            $elements['IbanRight'] = [
                'lines' => $lines,
                'attributes' => $this->getIbanRightAttr()
            ];
        }

        if ($this->getDisplayPaymentReason()) {
            // Place payment reason lines
            $lines = [
                $paymentSlipData->getPaymentReasonLine1(),
                $paymentSlipData->getPaymentReasonLine2(),
                $paymentSlipData->getPaymentReasonLine3(),
                $paymentSlipData->getPaymentReasonLine4()
            ];
            $elements['paymentReason'] = [
                'lines' => $lines,
                'attributes' => $this->getPaymentReasonAttr()
            ];
        }

        if ($this->getDisplayCode()) {
            // Place payment reason lines
            $lines = array(
                $paymentSlipData->getCode().'>',
                $paymentSlipData->getCodeLine2()
            );
            $elements['codeLines'] = array(
                'lines'      => $lines,
                'attributes' => $this->getCodeLineAttr()
            );
        }

        if ($paymentSlipData->getEncodeValues()) {
            $elements = $this->encodeElements($elements);
        }

        return $elements;
    }
}
