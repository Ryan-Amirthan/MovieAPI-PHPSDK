<?php

namespace Tmdb\Types;

enum AccountRatedMoviesRequestSortBy: string
{
    case CreatedAtAsc = "created_at.asc";
    case CreatedAtDesc = "created_at.desc";
}
