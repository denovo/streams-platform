<?php namespace Anomaly\Streams\Platform\Ui\ControlPanel\Component\Section;

use Anomaly\Streams\Platform\Ui\ControlPanel\Component\Section\Guesser\HrefGuesser;
use Anomaly\Streams\Platform\Ui\ControlPanel\Component\Section\Guesser\TextGuesser;
use Anomaly\Streams\Platform\Ui\ControlPanel\ControlPanelBuilder;

/**
 * Class SectionGuesser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\ControlPanel\Component\Section
 */
class SectionGuesser
{

    /**
     * The text guesser.
     *
     * @var TextGuesser
     */
    protected $text;

    /**
     * The HREF guesser.
     *
     * @var HrefGuesser
     */
    protected $href;

    /**
     * Create a new SectionGuesser instance.
     *
     * @param TextGuesser $text
     * @param HrefGuesser $href
     */
    function __construct(TextGuesser $text, HrefGuesser $href)
    {
        $this->text = $text;
        $this->href = $href;
    }

    /**
     * Guess section properties.
     *
     * @param ControlPanelBuilder $builder
     */
    public function guess(ControlPanelBuilder $builder)
    {
        $sections = $builder->getSections();

        foreach ($sections as &$section) {
            $this->text->guess($section);
            $this->href->guess($section);
        }

        $builder->setSections($sections);
    }
}