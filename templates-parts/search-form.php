<form method="get" action="<?php echo esc_url(home_url('/events-search/')); ?>">
    <input type="text" name="s" placeholder="Search for events...">
    <input type="date" name="event_date">
    <select name="location">
        <option value="">Select Location</option>
        <!-- Populate dynamically with locations -->
    </select>
    <button type="submit">Search</button>
</form>
