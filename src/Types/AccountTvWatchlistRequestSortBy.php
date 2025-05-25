<?php

namespace Tmdb\Types;

enum AccountTvWatchlistRequestSortBy: string
{
    case CreatedAtAsc = "created_at.asc";
    case CreatedAtDesc = "created_at.desc";
}
