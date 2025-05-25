<?php

namespace Tmdb\Types;

use Tmdb\Core\Json\JsonSerializableType;
use Tmdb\Core\Json\JsonProperty;

class ListDetailsResponseComments extends JsonSerializableType
{
    /**
     * @var mixed $movie617127
     */
    #[JsonProperty('movie:617127')]
    public mixed $movie617127;

    /**
     * @var mixed $movie986056
     */
    #[JsonProperty('movie:986056')]
    public mixed $movie986056;

    /**
     * @var mixed $movie822119
     */
    #[JsonProperty('movie:822119')]
    public mixed $movie822119;

    /**
     * @var mixed $movie533535
     */
    #[JsonProperty('movie:533535')]
    public mixed $movie533535;

    /**
     * @var mixed $movie609681
     */
    #[JsonProperty('movie:609681')]
    public mixed $movie609681;

    /**
     * @var mixed $movie447365
     */
    #[JsonProperty('movie:447365')]
    public mixed $movie447365;

    /**
     * @var mixed $movie640146
     */
    #[JsonProperty('movie:640146')]
    public mixed $movie640146;

    /**
     * @var mixed $movie505642
     */
    #[JsonProperty('movie:505642')]
    public mixed $movie505642;

    /**
     * @var mixed $movie616037
     */
    #[JsonProperty('movie:616037')]
    public mixed $movie616037;

    /**
     * @var mixed $movie453395
     */
    #[JsonProperty('movie:453395')]
    public mixed $movie453395;

    /**
     * @var mixed $movie634649
     */
    #[JsonProperty('movie:634649')]
    public mixed $movie634649;

    /**
     * @var mixed $movie524434
     */
    #[JsonProperty('movie:524434')]
    public mixed $movie524434;

    /**
     * @var mixed $movie566525
     */
    #[JsonProperty('movie:566525')]
    public mixed $movie566525;

    /**
     * @var mixed $movie497698
     */
    #[JsonProperty('movie:497698')]
    public mixed $movie497698;

    /**
     * @var mixed $movie429617
     */
    #[JsonProperty('movie:429617')]
    public mixed $movie429617;

    /**
     * @var mixed $movie299534
     */
    #[JsonProperty('movie:299534')]
    public mixed $movie299534;

    /**
     * @var mixed $movie299537
     */
    #[JsonProperty('movie:299537')]
    public mixed $movie299537;

    /**
     * @var mixed $movie363088
     */
    #[JsonProperty('movie:363088')]
    public mixed $movie363088;

    /**
     * @var mixed $movie299536
     */
    #[JsonProperty('movie:299536')]
    public mixed $movie299536;

    /**
     * @var mixed $movie284054
     */
    #[JsonProperty('movie:284054')]
    public mixed $movie284054;

    /**
     * @param array{
     *   movie617127?: mixed,
     *   movie986056?: mixed,
     *   movie822119?: mixed,
     *   movie533535?: mixed,
     *   movie609681?: mixed,
     *   movie447365?: mixed,
     *   movie640146?: mixed,
     *   movie505642?: mixed,
     *   movie616037?: mixed,
     *   movie453395?: mixed,
     *   movie634649?: mixed,
     *   movie524434?: mixed,
     *   movie566525?: mixed,
     *   movie497698?: mixed,
     *   movie429617?: mixed,
     *   movie299534?: mixed,
     *   movie299537?: mixed,
     *   movie363088?: mixed,
     *   movie299536?: mixed,
     *   movie284054?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->movie617127 = $values['movie617127'] ?? null;
        $this->movie986056 = $values['movie986056'] ?? null;
        $this->movie822119 = $values['movie822119'] ?? null;
        $this->movie533535 = $values['movie533535'] ?? null;
        $this->movie609681 = $values['movie609681'] ?? null;
        $this->movie447365 = $values['movie447365'] ?? null;
        $this->movie640146 = $values['movie640146'] ?? null;
        $this->movie505642 = $values['movie505642'] ?? null;
        $this->movie616037 = $values['movie616037'] ?? null;
        $this->movie453395 = $values['movie453395'] ?? null;
        $this->movie634649 = $values['movie634649'] ?? null;
        $this->movie524434 = $values['movie524434'] ?? null;
        $this->movie566525 = $values['movie566525'] ?? null;
        $this->movie497698 = $values['movie497698'] ?? null;
        $this->movie429617 = $values['movie429617'] ?? null;
        $this->movie299534 = $values['movie299534'] ?? null;
        $this->movie299537 = $values['movie299537'] ?? null;
        $this->movie363088 = $values['movie363088'] ?? null;
        $this->movie299536 = $values['movie299536'] ?? null;
        $this->movie284054 = $values['movie284054'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
