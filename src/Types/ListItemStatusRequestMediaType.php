<?php

namespace Tmdb\Types;

enum ListItemStatusRequestMediaType: string
{
    case Empty = "";
    case Movie = "movie";
    case Tv = "tv";
}
