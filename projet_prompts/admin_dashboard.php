<div class="card">
    <h3>Most Active Contributor</h3>
    <p>
        <?php if (!empty($plusActifs)): ?>
            <?= htmlspecialchars($plusActifs[0]['name']); ?> 
            <span style="font-size: 0.8rem; color: var(--text-light);">
                (<?= $plusActifs[0]['total']; ?> prompts)
            </span>
        <?php else: ?>
            Aucun contributeur
        <?php endif; ?>
    </p>
</div>