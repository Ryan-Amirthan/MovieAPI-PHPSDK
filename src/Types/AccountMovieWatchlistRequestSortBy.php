<?php

namespace Tmdb\Types;

enum AccountMovieWatchlistRequestSortBy: string
{
    case CreatedAtAsc = "created_at.asc";
    case CreatedAtDesc = "created_at.desc";
}
