<?php

namespace Tmdb\Types;

enum AccountFavoriteMoviesRequestSortBy: string
{
    case CreatedAtAsc = "created_at.asc";
    case CreatedAtDesc = "created_at.desc";
}
